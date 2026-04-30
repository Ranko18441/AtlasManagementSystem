<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * 
     * 
     * 
     * 
     */


    public function rules()
    {
        return [
            'over_name' => 'required|string|max:10',
            'under_name' =>'required|string|max:10',
            'over_name_kana' =>'required|string|max:30|regex:/^[ァ-ヶー]+$/u',
            'under_name_kana' =>'required|string|max:30|regex:/^[ァ-ヶー]+$/u',
            'mail_address' =>'required|email|max:100|unique:users,mail_address',
            'sex' =>'required|integer|in:1,2,3',
            'old_year' =>'required|integer|min:2000',
            'old_month' =>'required|integer|between:1,12',
            'old_day' =>'required|integer|between:1,31',
            'birthday' => 'required|before_or_equal:today',
            'role' =>'required|integer|in:1,2,3,4',
            'password' =>'required|string|min:8|max:30|confirmed',
        ];
    }

    // prepareForValidationとwithValidatorは存在しない日付の記載を防ぐため追記
    public function prepareForValidation()
{
    if ($this->old_year && $this->old_month && $this->old_day) {
        $this->merge([
            'birthday' => sprintf(
                '%04d-%02d-%02d',
                $this->old_year,
                $this->old_month,
                $this->old_day
            ),
        ]);
    }

}

public function withValidator($validator)
{
    $validator->after(function ($validator) {
        if (!checkdate($this->old_month, $this->old_day, $this->old_year)) {
            $validator->errors()->add('birthday', '正しい日付を入力してください');
        }
    });
}


    public function messages(): array
    {
        return [
          'over_name.required'  => '入力してください',
          'over_name.max'  => '性は10文字以下で入力してください',
          'under_name.required' => '入力してください',
          'under_name.max' => '名は10文字以下で入力してください',
          'over_name_kana.required' => '入力してください',
          'over_name_kana.max' => '30文字以下で入力してください',
          'over_name_kana.regex'  => 'カタカナが必須',
          'under_name_kana.required' => '入力してください',
          'under_name_kana.max' => '30文字以下で入力してください',
          'under_name_kana.regex'  => 'カタカナが必須',
          'mail_address.required' => 'メールアドレスは必須です',
          'mail_address.max' => '100文字以下で入力してください',
          'mail_address.email' => '正しいメールアドレス形式で入力してください',
          'mail_address.unique' => '登録済みのものは不可です',
          'sex.required' => '性別は選択してください',
          'sex.in'=> '男性か女性かその他を選択してください',
          'old_year.min' => '2000年以降の日付を入力してください',
          'role.required' => '必須項目です',
          'role.in' => '講師(国語)、講師(数学)、教師(英語)、生徒以外無効です',
          'password.required' => '必須項目です',
          'password.min' => '8文字以上で入力してください',
          'password.max' => '30文字以下で入力してください',
          'password.confirmed' => '確認用も同じにしてください',
        ];
    }
}
