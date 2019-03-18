<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelRequest extends FormRequest
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
            'kategori_id' => 'required',
            'judul' => 'required|min:3',
            'isi' => 'required',
            'headerImage' => 'image|nullable|max:1999',
            'status_artikel' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'kategori_id' => 'Kategori',
            'judul' => 'Judul Artikel',
            'isi' => 'Isi',
            'status_artikel' => 'Status Artikel'
        ];
    }

    public function messages()
    {
        return [
            'kategori_id.required' => ':attribute Harus di Isi',
            'judul.required' => ':attribute Harus di Isi',
            'judul.min' => ':attribute Minimal Harus 3 Karater',
            'isi.required' => ':attribute Harus di Isi',
            'status_artikel.required' => ':attribute Harus di Isi'
        ];
    }

}
