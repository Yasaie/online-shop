<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class CityRequest extends BaseRequest
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
                Rule::unique('cities', 'name')
                    ->ignore($this->route()->parameter('city'))
            ],
            'state' => 'required|exists:states,id',
        ];
    }
}
