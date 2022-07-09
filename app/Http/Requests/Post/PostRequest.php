<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name' => 'required|max:255|',
            'thumb' => 'required',
            'summary' => 'required|max:255',
            'content' => 'required',
            'cat_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tiêu đề bài viết',
            'name.max' => 'Tiêu đề bài viết không được quá 255 ký tự',
            'thumb.required' => 'Vui lòng chọn ảnh cho bài viết',
            'summary.required' => 'Vui lòng nhập mô tả ngắn cho bài viết',
            'summary.max' => 'Mô tả ngắn không được quá 255 ký tự',
            'content.required' => 'Vui lòng nhập nội dung cho bài viết',
            'cat_id.required' => 'Vui lòng chọn Danh mục cho bài viết',
            
        ];
    }
}
