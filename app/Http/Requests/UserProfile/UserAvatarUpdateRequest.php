<?php

namespace App\Http\Requests\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class UserAvatarUpdateRequest extends FormRequest
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
            'photo' => 'image|mimes:jpg,bmp,png,jpeg|max:512|required'
        ];
    }

    public function messages()
    {
        return [
            'photo.mimes' => 'ფოტო უნდა იყოს ერთ-ერთი ფორმატი: JPG; JPEG; PNG; BMP.',
            'photo.max' => 'ფოტო არ უნდა აღემატებოდეს 512 კილობაიტს.',
            'photo.required' => 'აირჩიეთ ფოტო.',
        ];
    }
}
