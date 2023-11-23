<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'pertanyaan' => 'required|max:100|min:3',
            'kategori' => 'required|in:Numeric,Verbal,Logika',
            'jawaban_a' => 'required|max:100|min:3',
            'jawaban_b' => 'required|max:100|min:3',
            'jawaban_c' => 'required|max:100|min:3',
            'jawaban_d' => 'required|max:100|min:3',
            'kunci' => 'required|in:a,b,c,d',
        ];
    }
}
