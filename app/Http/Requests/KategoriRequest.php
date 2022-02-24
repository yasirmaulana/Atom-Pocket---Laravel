<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
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
            'namakategori' => ['required', 'min:5'],
            'deskripsi' => ['max:100']
        ];
    }

    public function messages()
    {
        return [
            'namakategori.required' => 'Nama kategori harus diisi',
            'namakategori.min' => 'Nama kategori minimal 5 karakter',
            'deskripsi.max' => 'Deskripsi maksimal 100 kareakter'
        ];
    }
}
