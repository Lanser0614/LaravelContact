<?php

namespace App\Modules\V1\Phone\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 */
class PhoneResource extends JsonResource
{


    public function toArray($request)
    {
        return [
            'id' => $this->id,
            "phone_number" => $this->phone_number,
            "contact_name" => $this->contact,
        ];
    }
}
