<?php

namespace App\Http\Requests\Backend\Company\Coupons;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
        return [
            'code' => 'required|max:100|unique:coupons',
            'discount' => 'required|max:100',
            'expire_date' => 'required',
            'trip_type' => 'required',
            'status' => 'required',
        ];
    }

    /**
     * Get the update validation rules that apply to the request.
     *
     * @return array
     */
    public function updateRules()
    {
        return [
            'code' => 'required|max:100|unique:coupons,code,'.request()->coupon_id,
            'discount' => 'required|max:100',
            'expire_date' => 'required',
            'trip_type' => 'required',
            'status' => 'required',
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
            'code.required' => 'حقل كود الخصم مطلوب',
            'code.unique' => 'هذا الكود مستخدم من قبل',
            'discount.required' => 'حقل نسبة الخصم مطلوب',
            'expire_date.required' => 'حقل الإيميل مطلوب',
            'expire_date.required' => 'حقل تاريخ النهاية مطلوب',
            'status.required' => 'حقل حالة كود الحصم مطلوب',
        ];
    }
}
