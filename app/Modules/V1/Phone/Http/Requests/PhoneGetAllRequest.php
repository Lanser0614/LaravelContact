<?php

namespace App\Modules\V1\Phone\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 */
class PhoneGetAllRequest extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            "perPage" => ["numeric"],
            "page" => ["numeric"],
            "id" => ["numeric"],
        ];
    }
}
