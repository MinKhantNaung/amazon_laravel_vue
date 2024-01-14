<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'country' => 'required',
            'addr1' => 'required|string|max:255',
            'addr2' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'post_code' => 'required|string|max:255',
        ];
    }
}
