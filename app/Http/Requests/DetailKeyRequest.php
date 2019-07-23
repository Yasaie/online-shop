<?php

namespace App\Http\Requests;

class DetailKeyRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'category' => 'required|exists:detail_categories,id',
            'highlighted' => 'required|boolean'
        ]);
    }
}
