<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'title'     => 'required|max:255',
            'user_pin'    => 'required|numeric|exists:users,pin',
            'post_id'    => 'required|integer|exists:posts,id',
            'parent_id'    => 'nullable|integer|exists:comments,id',
        ];
    }
}
