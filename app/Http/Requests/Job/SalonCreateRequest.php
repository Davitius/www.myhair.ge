<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class SalonCreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:25', 'unique:salons'],
            'motto' => ['sometimes', 'max:25'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:55'],
            'location' => 'required',
            'latitude' => ['sometimes'],
            'longitude' => ['sometimes'],
            'photo' => ['image', 'sometimes', 'mimes:jpg,bmp,png,jpeg'],
            'work_sh' => 'required',
            'work_fh' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'სალონის დასახელება - შევსება სავალდებულოა.',
            'name.max' => 'დასახელება არ უნდა აღემატებოდეს 25 სიმბოლოს.',
            'name.unique' => 'ესეთი სალონის დასახელება უკვე არსებობს.',

            'motto.max' => 'დევიზი არ უნდა აღემატებოდეს 25 სიმბოლოს.',

            'location.required' => 'ლოკაცია - შევსება სავალდებულოა.',

            'latitude.min' => 'არასწორე კოორდინატის ფორმაა.',
            'latitude.max' => 'არასწორე კოორდინატის ფორმაა.',

            'longitude.min' => 'არასწორე კოორდინატის ფორმაა.',
            'longitude.max' => 'არასწორე კოორდინატის ფორმაა.',

            'phone.required' => 'ტელეფონი - შევსება სავალდებულოა.',
            'phone.numeric' => 'ტელეფონის ნომერი უნდა შედგებოდეს მხოლოდ ციფრებისგან.',

            'address.required' => 'მისამართი - შევსება სავალდებულოა.',
            'address.max' => 'მისამართი არ უნდა აღემატებოდეს 55 სიმბოლოს.',

            'photo.mimes' => 'ფოტო უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'photo.size' => 'ფოტო არ უნდა აღემატებოდეს 512 კილობაიტს.',

            'work_sh.required' => 'აირჩიეთ სამუშაოს დაწყების დრო.',
            'work_fh.required' => 'აირჩიეთ სამუშაოს დასრულების დრო.',

        ];
    }
}
