<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DompetRequest extends FormRequest
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
            'namadompet' => ['required', 'min:5'],
            'deskripsi' => ['max:100']
        ];
    }

    public function messages()
    {
        return [
            'namadompet.required' => 'Nama dompet harus diisi',
            'namadompet.min' => 'Nama dompet minimal 5 karakter',
            'deskripsi.max' => 'Deskripsi maksimal 100 kareakter'
        ];
    }
}
