<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputValidation extends FormRequest
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
        return [
            //
            'name' => 'required|min:4|max:255',
            // 'password' => 'required|string|min:8|confirmed',
            // 'email' => 'required|unique:users|max:255|email',
            'description' => 'required|string|min:8|max:255',
            'tag' => 'required|string|min:8|max:100',
            'category' => 'required|string|min:8|max:100',
            'image' => 'image|mimes:jpeg,png,jpg|max:2050',


        ];
    }
    public function messages()
    {
        return [
            'name.required' => __('A name is required'),
            'password.required'  => __('A password is required'),
            'description.required'  => __('A description is required'),
            'tag.required'  => __('A tag is required'),
            'category.required'  => __('A category is required'),
            'email.required' => __('We need to know your e-mail address!'),

            'name.max' => __('A name must be 255 maximum'),
            'email.max' => __('A email must be 255 maximum'),
            'description.max' => __('A description must be 255 maximum'),
            'tag.max' => __('A tag must be 100 maximum'),

            'name.min' => __('A name must be 4 minimum'),
            'password.min' => __('A password must be 8 minimum'),
            'description.min' => __('A description must be 8 minimum'),
            'tag.min' => __('A tag must be 8 minimum'),
            'category.min' => __('A category must be 8 minimum'),

            'name.unique' => __('A name is unique'),
            'password.string'  => __('A password is string'),
            'password.confirmed'  => __('A password must be confirmed'),
            'tag.string'  => __('A tag is string'),
            'description.string'  => __('A description is string'),
            'category.string' => __('A category is string'),


        ];
    }
    public function attributes()
    {
        return [
            'email' => 'email address',
        ];
    }
}