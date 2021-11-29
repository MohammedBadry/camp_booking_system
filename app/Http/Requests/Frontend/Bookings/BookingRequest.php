<?php

namespace App\Http\Requests\Frontend\Bookings;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'name' => 'required|max:191',
            'email' => 'required',
            'mobile' => 'required',
            'passport' => 'required|max:16',
            'terms' => 'required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب!',
            'email.required' => 'حقل الإيميل مطلوب',
            'mobile.required' => 'رقم الجول مطلوب',
            'passport.required' => 'حقل الهوية مطلوب',
            'terms.required' => 'يجب الموافقة على الشروط والأحكام!',
        ];
    }
}
