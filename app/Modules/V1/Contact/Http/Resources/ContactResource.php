<?php

namespace App\Modules\V1\Contact\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 */
class ContactResource extends JsonResource
{


    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'contact_name' => $this->contact_name,
            'phones' => $this->phones,
            'emails' => $this->emails,
        ];
    }
}
