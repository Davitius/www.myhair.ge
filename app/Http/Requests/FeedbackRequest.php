<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'user_id' => ['required'],
            'star' => 'required|integer|max:5',
            'feedback' => ['required', 'max:300'],
        ];
    }

    public function messages()
    {
        return [
            'user_id.unique' => 'თქვენ უკვე შეაფასეთ.',
            'star.required' => 'რამდენი ვასკვლავით აფასებთ?',
            'star.max' => '5 ვარსკვლავზე მეტად ვერ შეაფასებთ.',

            'feedback.required' => 'დატოვეთ კომენტარი',
            'feedback.max' => 'კომენტარი არ უნდა აღემატებოდეს 300 სიმბოლოს.',
        ];
    }
}
