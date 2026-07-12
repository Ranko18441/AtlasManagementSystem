<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'main_category_id' => [
            'required',
            'exists:main_categories,id',
        ],

        'sub_category_name' => [
            'required',
            'string',
            'max:100',
            'unique:sub_categories,sub_category',
             ],
            //
        ];
    }

    public function messages()
{
    return [
        'main_category_id.required' => 'メインカテゴリーを選択してください。',
        'main_category_id.exists' => '登録されているメインカテゴリーを選択してください。',

        'sub_category_name.required' => 'サブカテゴリーを入力してください。',
        'sub_category_name.string' => 'サブカテゴリーは文字列で入力してください。',
        'sub_category_name.max' => 'サブカテゴリーは100文字以内で入力してください。',
        'sub_category_name.unique' => '同じ名前のサブカテゴリーは登録できません。',
    ];
    }
}
