<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Validation\Rule;

class CategoryRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'parent' => [
                'nullable',
                Rule::in(Category::all()->pluck('id')->push(0))
            ],
        ]);
    }
}
