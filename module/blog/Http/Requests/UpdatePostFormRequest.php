<?php

namespace Module\blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdatePostFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'required|string|min:2|max:255',
            'content' => 'required|string|min:2'
        ];
    }
}
