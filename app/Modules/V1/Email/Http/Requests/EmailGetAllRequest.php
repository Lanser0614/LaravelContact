<?php

namespace App\Modules\V1\Email\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 */
class EmailGetAllRequest extends FormRequest
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
