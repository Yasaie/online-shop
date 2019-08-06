<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\User
 *
 * @mixin \Eloquent
 * @mixin HasRoles
 * @mixin HasMediaTrait
 * @mixin Role
 */
class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use Notifiable,
        HasRoles,
        HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'country_id',
        'state_id',
        'city_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sellers');
    }

    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }

    public function profile()
    {
        return $this->belongsToMany(Profile::class, 'user_profiles')
            ->withPivot('data');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function requestedOrders()
    {
        return $this->sellers->flatMap(function ($q) {
            return $q->orders()->whereHas('cart', function ($q) {
                $q->whereIn('status', ['success', 'checking']);
            })->get();
        });
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('draft')
            ->acceptsFile(function (File $file) {
                $acceptable = [
                    'image/jpeg',
                    'image/png',
                    'image/gif',
                ];
                return in_array($file->mimeType, $acceptable);
            });
    }

    public function myCart()
    {
        return $this
            ->carts()
            ->where('status', '<=', 5)
            ->firstOrCreate([], [
                'status' => 'cart'
            ]);
    }

    public function myOrders($all = true)
    {
        return $all
            ? $this->myCart()->orders
            : $this->myCart()->orders();
    }

    public function myOrder($id)
    {
        return $this->myOrders(false)
            ->find($id);
    }

    /**
     * @return mixed
     */
    public function getRoleLocales()
    {
        return $this->roles->map(function ($r) {
            $locale_name = 'model.' . $r->name;
            return __($locale_name) == $locale_name
                ? $r->name
                : __($locale_name);
        });
    }

}
