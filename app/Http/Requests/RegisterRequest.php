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
            'old_year' =>'required|integer',
            'old_month' =>'required|integer|between:1,12',
            'old_day' =>'required|integer|between:1,31',
            'role' =>'required|integer|in:1,2,3,4',
            'password' =>'required|string|min:8|max:30|confirmed',
        ];
    }


    public function messages(): array
    {
        return [
          'over_name'  => ':名前は必ず10文字以下で入力してください',
          'under_name'       => ':名前は必ず10文字以下で入力してください',
          'over_name_kana'   => ':カタカナで必ず30文字以下で入力してください',
          'under_name_kana'      => ':カタカナで必ず30文字以下で入力してください',
          'mail_address' => ':メールアドレスは必須項目です。登録済みのものは不可で100文字以下',
          'sex'    => ':男性か女性かその他を選択してください',
          'old_year'  => ':2000年1月1日から今日までを選択してください',
          'old_month'       => ':1月から12月の範囲の選択となります',
          'old_day' => ':1日から31日の範囲の選択となります',
          'role' => ':講師(国語)、講師(数学)、教師(英語)、生徒以外無効です',
          'password' => ':8文字以上30文字以下 確認用も同じにしてください',
        ];
    }
}
