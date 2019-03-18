<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriArtikelRequest extends FormRequest
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
            'nama' => 'required|unique:kategori,nama',
            'status_kategori' => 'min:10'
        ];
    }

    public function messages() {
        return [
            
            'nama.required' => ':attribute Harus di Isi',
            'nama.unique' => 'Tidak Boleh Mengisi :attribute Yang Sama',            
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama Kategori'
        ];
    }
}
