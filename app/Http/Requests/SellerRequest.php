<?php

namespace App\Http\Requests;

class SellerRequest extends PricingRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'seller' => 'required|exists:users,id',
        ]);
    }
}
