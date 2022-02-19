<?php

namespace App\Modules\V1\Contact\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 */
class ContactCreateRequest extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'contact_name' => ['required', 'string', 'unique:contacts,contact_name,except,contact_name']
        ];
    }
}
