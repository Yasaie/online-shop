<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class StateRequest extends BaseRequest
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
                Rule::unique('states', 'name')
                    ->ignore($this->route()->parameter('state'))
            ],
            'country' => 'required|exists:countries,id',
        ];
    }
}
