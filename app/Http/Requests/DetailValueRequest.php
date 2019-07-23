<?php

namespace App\Http\Requests;

class DetailValueRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'detail' => 'required|exists:detail_keys,id',
        ]);
    }
}
