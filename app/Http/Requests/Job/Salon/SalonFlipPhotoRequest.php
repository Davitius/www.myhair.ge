<?php

namespace App\Http\Requests\Job\Salon;

use Illuminate\Foundation\Http\FormRequest;

class SalonFlipPhotoRequest extends FormRequest
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
            'flipphoto1' => 'image|sometimes|mimes:jpg,bmp,png,jpeg|max:512',
            'flipphoto2' => 'image|sometimes|mimes:jpg,bmp,png,jpeg|max:512',
            'flipphoto3' => 'image|sometimes|mimes:jpg,bmp,png,jpeg|max:512',
            'flipphoto4' => 'image|sometimes|mimes:jpg,bmp,png,jpeg|max:512',
            'flipphoto5' => 'image|sometimes|mimes:jpg,bmp,png,jpeg|max:512'
        ];
    }

    public function messages()
    {
        return [
            'flipphoto1.mimes' => 'ფოტო №1 უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'flipphoto1.max' => 'ფოტო №1 არ უნდა აღემატებოდეს 512 კილობაიტს.',
            'flipphoto1.dimensions' => 'ფოტო №1 უნდა იყოს 16:9 პროპორციით.',

            'flipphoto2.mimes' => 'ფოტო №2 უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'flipphoto2.max' => 'ფოტო №2 არ უნდა აღემატებოდეს 512 კილობაიტს.',
            'flipphoto2.dimensions' => 'ფოტო №2 უნდა იყოს 16:9 პროპორციით.',

            'flipphoto3.mimes' => 'ფოტო №3 უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'flipphoto3.max' => 'ფოტო №3 არ უნდა აღემატებოდეს 512 კილობაიტს.',
            'flipphoto3.dimensions' => 'ფოტო №3 უნდა იყოს 16:9 პროპორციით.',

            'flipphoto4.mimes' => 'ფოტო №4 უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'flipphoto4.max' => 'ფოტო №4 არ უნდა აღემატებოდეს 512 კილობაიტს.',
            'flipphoto4.dimensions' => 'ფოტო №4 უნდა იყოს 16:9 პროპორციით.',

            'flipphoto5.mimes' => 'ფოტო №5 უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'flipphoto5.max' => 'ფოტო №5 არ უნდა აღემატებოდეს 512 კილობაიტს.',
            'flipphoto5.dimensions' => 'ფოტო №5 უნდა იყოს 16:9 პროპორციით.',
        ];
    }
}
