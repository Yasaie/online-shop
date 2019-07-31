<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'email' => [
                'required',
                'email',
            ],
            'confirm_password' => 'same:password',
            'role' => 'required|exists:roles,id'
        ];

        # update
        if ($id = $this->route()->parameter('user')) {
            $rules['email'][] = Rule::unique('users')->ignore($id);

        # create
        } else {
            $rules['password'] = 'required';
            $rules['email'][] = Rule::unique('users');
        }

        return $rules;
    }
}
