<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => ['required', 'string','max:255'],
            'last_name' => ['required', 'string','max:255'],
            'gender' => ['required', 'integer', 'in:0,1,2'],
            'email' => ['required', 'email','string','max:255'],
            'tel1' => ['required', 'string', 'max:255', 'digits_between:1,5', 'regex:/^[0-9]+$/'], 
            'tel2' => ['required', 'string', 'max:255', 'digits_between:1,5', 'regex:/^[0-9]+$/'], 
            'tel3' => ['required', 'string', 'max:255', 'digits_between:1,5', 'regex:/^[0-9]+$/'], 
            'address' => ['required', 'string', 'max:255'], 
            'building' => ['nullable', 'string', 'max:255'],
            'detail' => ['required', 'string', 'max:120'],
            'category_id' => 'required|exists:categories,id',
        ];
    }
    public function messages()
    {
        return[
            'first_name.required' => '姓を入力してください',
            'last_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'tel1.required' => '電話番号を入力してください',
            'tel1.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel1.regex' => '電話番号は半角数字のみで入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel2.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel2.regex' => '電話番号は半角数字のみで入力してください',
            'tel3.required' => '電話番号を入力してください',
            'tel3.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel3.regex' => '電話番号は半角数字のみで入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください',
        ];

    }
}
