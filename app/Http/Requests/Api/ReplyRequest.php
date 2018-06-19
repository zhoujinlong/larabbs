<?php

namespace App\Http\Requests\Api;


class ReplyRequest extends FormRequest
{

    public function rules()
    {
        return [
            'content' => 'required|min:2'
        ];
    }

    public function attributes(){
        return [
            'content' => '回复内容'
        ];
    }
}
