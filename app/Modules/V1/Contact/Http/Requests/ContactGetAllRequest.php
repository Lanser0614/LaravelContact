<?php

namespace App\Modules\V1\Contact\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 */
class ContactGetAllRequest extends FormRequest
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
