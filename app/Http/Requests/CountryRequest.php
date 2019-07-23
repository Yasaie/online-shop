<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class CountryRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('countries', 'name')
                    ->ignore($this->route()->parameter('country'))
            ],
        ];
    }
}
