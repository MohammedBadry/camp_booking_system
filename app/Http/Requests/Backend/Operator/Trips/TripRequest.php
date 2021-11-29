<?php

namespace App\Http\Requests\Backend\Operator\Trips;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
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
            'title' => 'required|string|max:191',
            'price' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
            'capacity' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
            'trip_date' => 'required',
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|max:100|unique:trips,code',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    /**
     * Get the update validation rules that apply to the request.
     *
     * @return array
     */
    public function updateRules()
    {
        if(request()->has('image') && request()->image!='') {
            return ['image' => 'image|mimes:jpeg,png,jpg,gif,svg'];
        }
        return [
            'title' => 'required|string|max:191',
            'price' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
            'capacity' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
            'trip_date' => 'required',
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|max:100|unique:trips,code,'.request()->trip_id,
            'description' => 'required|string',
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
            'title.required' => 'حقل العنوان مطلوب!',
            'price.required' => 'حقل السعر مطلوب!',
            'capacity.required' => 'حقل السعة مطلوب!',
            'trip_date.required' => 'حقل التاريخ مطلوب!',
            'category_id.required' => 'حقل الفئة مطلوب!',
            'code.required' => 'حقل كود الرحلة مطلوب!',
            'code.unique' => 'هذا الكود مستخدم من قبل',
            'description.required' => 'حقل الوصف مطلوب',
            'image.required' => 'حقل الصورة مطلوب',
        ];
    }
}
