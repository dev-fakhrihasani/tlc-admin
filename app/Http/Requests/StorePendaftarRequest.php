<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendaftarRequest extends FormRequest
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
            'nama' => 'required',
            'email' => 'required|email',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'jenjang_pendidikan' => 'required|in:SMP/MTs,SMA/SMK/MA',
            'asal_sekolah' => 'required',
            'kelas' => 'required',
            'peminatan' => 'required|in:SNBT,Kedinasan',
            'alasan_join' => 'required',
            'ss1' => 'image|file|max:2048',
            'ss2' => 'image|file|max:2048',
            'ss3' => 'image|file|max:2048',
            'ss4' => 'image|file|max:2048',
        ];
    }
}
