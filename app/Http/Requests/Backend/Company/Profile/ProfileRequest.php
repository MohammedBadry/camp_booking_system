<?php

namespace App\Http\Requests\Backend\Company\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        if(request()->password!='' || request()->password_confirmation!='') {
            return ['password' => 'sometimes|min:8|confirmed'];
        }
        if(request()->has('image') && request()->image!='') {
            return ['image' => 'image|mimes:jpeg,png,jpg,gif,svg'];
        }
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            'mobile' => 'required|unique:users,mobile,'.auth()->user()->id,
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

        ];
    }
}
