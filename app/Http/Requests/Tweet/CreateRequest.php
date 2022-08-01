<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 認証きれた時はfalseになるように処理するとか色々できそう。
        return true;
    }

    // 入力されたtweetを返却するメソッド
    public function tweet(): string
    {
        return $this->input("tweet");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        return [
            'tweet' => 'required|max:140'
        ];
    }
}
