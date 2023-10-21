<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class StaffSearchRequest extends FormRequest
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
            'staffcode' => ['required'],
        ];
    }

    public function messages()
    {
        return [
          'staffcode.required' => 'საძიებო ველში შეიყვანეთ Staffcode.',
//            'staffcode.unique' => 'პერსონალი უკვე დამატებულია.',
        ];
    }
}
