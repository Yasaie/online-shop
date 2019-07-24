<?php

namespace App\Http\Requests;

class ProductRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'category' => 'required|exists:categories,id',
            'details.*' => 'exists:detail_values,id'
        ]);
    }
}
