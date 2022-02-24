<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
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
            'nilai' => ['required'],
            'deskripsi' => ['max:100']
        ];
    }

    public function messages()
    {
        return [
            'nilai.required' => 'Nilai harus diisi',
            'deskripsi.max' => 'Maksimal 100 karakter untuk isian deskripsi'
        ];
    }
}
