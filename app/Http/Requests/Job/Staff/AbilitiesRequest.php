<?php

namespace App\Http\Requests\Job\Staff;

use Illuminate\Foundation\Http\FormRequest;

class AbilitiesRequest extends FormRequest
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
                'service' => ['required'],
                'hour' => ['required'],
                'minute' => ['required'],
                'price' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'hour.required' => 'მიუთითეთ საათი.',

            'minute.required' => 'მიუთითეთ წუთი.',

            'price.required' => 'მიუთითეთ ფასი.',
        ];
    }
}
