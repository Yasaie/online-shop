<?php

namespace App\Http\Requests;

class PricingRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product' => 'required|exists:products,id',
            'amount' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'prev_price' => 'numeric|min:0',
            'post_price' => 'numeric|min:0',
        ];
    }
}
