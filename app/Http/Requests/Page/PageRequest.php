<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'name' => 'required|max: 255',
            'summary' => 'required|max: 255',
            'content' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tiêu đề trang',
            'name.max' => 'Tiêu đề trang không được quá 255 ký tự',
            'summary.required' => 'Vui lòng nhập mô tả ngắn cho trang',
            'summary.max' => 'Mô tả ngắn không được quá 255 ký tự',
            'content.required' => 'Vui lòng nhập nội dung trang',
            'active.required' => 'Vui lòng chọn kích hoạt',
        ];
    }
}
