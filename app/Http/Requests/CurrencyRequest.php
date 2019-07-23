<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Yasaie\Helper\Y;

class CurrencyRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name.' . config('app.fallback_locale') => 'required',
            'key' => [
                'required',
                'string',
                'size:3',
                Rule::unique('currencies', 'key')
                    ->ignore($this->route()->parameter('currency')),
            ],
            'ratio' => 'required|numeric',
            'places' => 'numeric|lte:9',
            'default_language' => [
                'nullable',
                Rule::in(Y::dotObject(config('global.langs'), 'getId()'))
            ]
        ];
    }
}
