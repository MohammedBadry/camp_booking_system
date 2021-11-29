<?php

namespace App\Http\Requests\Backend\Admin\Companies;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
            'roles' => 'required',
        ];
    }

    /**
     * Get the update validation rules that apply to the request.
     *
     * @return array
     */
    public function updateRules()
    {
        if(request()->password!='' || request()->password_confirmation!='') {
            return ['password' => 'sometimes|min:8|confirmed'];
        }
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'.request()->company_id,
            'mobile' => 'required|unique:users,mobile,'.request()->company_id,
            'roles' => 'required',
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
            'email.unique' => 'هذا الإيميل مستخدم من قبل',
            'mobile.required' => 'رقم الجول مطلوب',
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.confirmed' => 'كلمات المرور غير متطابقة',
            'role_name.required' => 'حقل الصلاحيات مطلوب',

        ];
    }
}
