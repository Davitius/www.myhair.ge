<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecaddRequest extends FormRequest
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
            'spec' => ['required', 'unique:categories'],
        ];
    }

    public function messages()
    {
        return [
            'spec.required' => 'ჩაწერეთ სპეციალობა.',
            'spec.unique' => 'ესეთი სახელის სპეციალობა უკვე არსებობს.',
        ];
    }
}
