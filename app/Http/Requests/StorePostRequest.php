<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'content.required' => 'không được để chống.',
            'content.string' => 'Nội dunng phải là chuỗi.',
            'content.max' => 'Nội dung vượt quá 255 kí tự.',
            'image.image' => 'Phải là ảnh.',
            'image.max' => 'ảnh phải nhỏ hơn 2mb',
        ];
    }
}
