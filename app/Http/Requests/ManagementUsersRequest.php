<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagementUsersRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute Harus di Isi',
            'email.required' => ':attribute Harus di Isi',
            'email.email' => ':attribute Format Tidak Sesuai',
            'email.unique' => ':attribute Sudah Terpakai',
            'password.required' => ':attribute Harus di Isi',
            'password.min' => ':attribute Minimal 8 Karakter',
            'password.confirmed' => ':attribute Tidak Sama Dengan Konfirmasi Passwird'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Nama',
            'email' => 'Email',
            'password' => 'Password'
        ];
    }
}
