<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BookingImportRequest extends FormRequest
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
            'excel_file'=>'required|max:50000|mimetypes:application/csv,application/excel,
                application/vnd.ms-excel, application/vnd.msexcel,
                text/csv, text/anytext, text/plain, text/x-c,
                text/comma-separated-values,
                inode/x-empty,
                application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
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
            'excel_file.required' => 'الملف مطلوب!',
            'excel_file.mimes' => 'صيغة الملف خاطئة!',
        ];
    }
}
