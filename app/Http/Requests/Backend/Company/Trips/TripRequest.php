<?php

namespace App\Http\Requests\Backend\Company\Trips;

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
        if(request()->get('type_id')==1) {
            return [
                'title' => 'required|string|max:191',
                'price' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
                'capacity' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
                'trip_date' => 'required',
                'operator_id' => 'required|exists:users,id',
                'category_id' => 'required|exists:categories,id',
                'code' => 'required|max:100|unique:trips,code',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'status' => 'required',
            ];
        } else {
            return [
                'title' => 'required|string|max:191',
                'size' => 'required',
                'from' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
                'to' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
                'camps_num' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
                'price' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
                'category_id' => 'required|exists:categories,id',
                'code' => 'required|max:100|unique:trips,code',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
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
        if(request()->has('image') && request()->image!='') {
            return ['image' => 'image|mimes:jpeg,png,jpg,gif,svg'];
        }
        if(request()->get('type_id')==1) {
            return [
                'title' => 'required|string|max:191',
                'price' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
                'capacity' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
                'trip_date' => 'required',
                'operator_id' => 'required|exists:users,id',
                'category_id' => 'required|exists:categories,id',
                'code' => 'required|max:100|unique:trips,code,'.request()->trip_id,
                'description' => 'required|string',
                'status' => 'required',
            ];
        } else {
            return [
                'title' => 'required|string|max:191',
                'size' => 'required',
                'from' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
                'to' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
                'camps_num' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
                'price' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/',
                'category_id' => 'required|exists:categories,id',
                'code' => 'required|max:100|unique:trips,code,'.request()->trip_id,
                'description' => 'required|string',
            ];
        }
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => '?????? ?????????????? ??????????!',
            'price.required' => '?????? ?????????? ??????????!',
            'size.required' => '?????? ?????? ???????????? ??????????!',
            'from.required' => '?????? ?????????? ???? ??????????!',
            'to.required' => '?????? ?????????? ?????? ??????????!',
            'camps_num.required' => '?????? ?????? ???????????????? ??????????!',
            'capacity.required' => '?????? ?????????? ??????????!',
            'trip_date.required' => '?????? ?????????????? ??????????!',
            'operator_id.required' => '?????? ???????????? ??????????!',
            'category_id.required' => '?????? ?????????? ??????????!',
            'code.required' => '?????? ?????? ???????????? ??????????!',
            'code.unique' => '?????? ?????????? ???????????? ???? ??????',
            'description.required' => '?????? ?????????? ??????????',
            'image.required' => '?????? ???????????? ??????????',
        ];
    }
}
