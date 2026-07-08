<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class becomeMailRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'why' => 'required|string',
            'pastExperience' => 'nullable|string',
            'curriculum' => 'required|mimes:pdf,doc,docx|max:1024',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
