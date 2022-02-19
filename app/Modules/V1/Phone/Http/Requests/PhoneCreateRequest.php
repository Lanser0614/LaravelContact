<?php

namespace App\Modules\V1\Phone\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 */
class PhoneCreateRequest extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'contact_id' => ['required', 'numeric', 'exists:contacts,id', ],
            'phone_number' => ['required', 'string' ,'unique:phones,phone_number,except,phone_number']
        ];
    }
}
