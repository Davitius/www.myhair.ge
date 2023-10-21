<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class SalonUpdateRequest extends FormRequest
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
            'motto' => ['sometimes', 'max:25'],
            'phone' => ['required', 'numeric'],
            'address' => ['string', 'max:55'],
            'location' => 'sometimes',
            'latitude' => ['sometimes'],
            'longitude' => ['sometimes'],
            'photo' => 'image|sometimes|mimes:jpg,bmp,png,jpeg|max:512',
            'work_sh' => 'required',
            'work_fh' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'motto.required' => 'ველი: "დევიზი"-ის შევსება სავალდებულოა.',
            'motto.max' => 'დევიზი არ უნდა აღემატებოდეს 25 სიმბოლოს.',

            'phone.required' => 'ველი: "ტელეფონი"-ის შევსება სავალდებულოა.',
            'phone.numeric' => 'ტელეფონის ნომერი უნდა შედგებოდეს მხოლოდ ციფრებისგან.',

            'address.required' => 'ველი: "მისამართი"-ის შევსება სავალდებულოა.',
            'address.max' => 'მისამართი არ უნდა აღემატებოდეს 55 სიმბოლოს.',

            'latitude.min' => 'არასწორე კოორდინატის ფორმაა.',
            'latitude.max' => 'არასწორე კოორდინატის ფორმაა.',

            'longitude.min' => 'არასწორე კოორდინატის ფორმაა.',
            'longitude.max' => 'არასწორე კოორდინატის ფორმაა.',

            'photo.mimes' => 'ფოტო უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'photo.max' => 'სალონის ფოტო არ უნდა აღემატებოდეს 512 კილობაიტს.',
            'photo.dimensions' => 'სურათი უნდა იყოს 5:3 პროპორციით.',

        ];
    }
}
