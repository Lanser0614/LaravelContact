<?php

namespace App\Modules\V1\Email\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 */
class EmailCreateRequest extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'contact_id' => ['required', 'numeric', 'exists:contacts,id', ],
            'email' => ['required', 'email', 'unique:emails,email,except,email']
        ];
    }
}
