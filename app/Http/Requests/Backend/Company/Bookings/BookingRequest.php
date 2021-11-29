<?php

namespace App\Http\Requests\Backend\Company\Bookings;

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
        if ($this->isMethod('POST')) {
            return $this->createRules();
        } else {
            return $this->updateRules();
        }
    }

    /**
     * Get the create validation rules that apply to the request.
     *
     * @return array
     */
    public function createRules()
    {
        if(request()->category_id==1) {
            return [
                'name' => 'required|string|max:191',
                'email' => 'required|email',
                'mobile' => 'required',
                'passport' => 'required',
                'category_id' => 'required|exists:categories,id',
                'code' => 'required|exists:trips,code',
            ];
        } else {
            return [
                'name' => 'required|string|max:191',
                'email' => 'required|email',
                'mobile' => 'required',
                'passport' => 'required',
                'category_id' => 'required|exists:categories,id',
                'code' => 'required|exists:trips,code',
                'period' => 'required',
            ];
        }
    }

    /**
     * Get the update validation rules that apply to the request.
     *
     * @return array
     */
    public function updateRules()
    {
        return [
            'code' => 'required|exists:trips,code',
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
            'category_id.required' => 'حقل الفئة مطلوب!',
            'code.required' => 'حقل كود الرحلة/المخيم مطلوب!',
            'period.required' => 'حقل تاريخ الحجز مطلوب!',
        ];
    }
}
