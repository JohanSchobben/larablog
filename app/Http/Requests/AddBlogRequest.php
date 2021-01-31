<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBlogRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'nullable}max:8000',
            'title' => 'required|max:50',
            'slug' => 'required|max:50|unique:blogs|alpha_dash',
            'publishDate' => 'nullable|before_or_equal:now',
            'hidden' => 'boolean|nullable'
        ];
    }
}
