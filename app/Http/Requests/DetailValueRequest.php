<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailValueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $langs = \Config::get('global.langs');

        return [
            'detail' => 'required|exists:detail_keys,id',
            'title.' . current($langs)->getId() => 'required'
        ];
    }
}
