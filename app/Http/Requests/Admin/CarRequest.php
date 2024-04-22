<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'nama_mobil' => 'required|string|max:255',
            'type_id' => 'required|numeric',
            'price' => 'required|numeric',
            'penumpang' => 'required|numeric',
            'description' => 'required',
            'image' => ['required','image','mimes:jpeg,png,jpg,gif','max:4096'],
            'status' =>  ['required']

        ];
    }

    public function messages()
    {
        return [
            'nama_mobil.required' => "Masukan nama mobil",
            'type_id.required' => "Masukan atau membuat type mobil dihalaman type",
            "price.required" => "Masukan harga mobil",
            "penumpang.required" => "Masukan kursi penumpang",
            "description.required" => "Masukan deskripsi",
            "image.required" => "Masukan Gambar dengan format jpeg,png,jpg,gif max 4mb",
            "status.required" => "isi status" 
        ];
    }
}
