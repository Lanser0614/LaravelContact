<?php

namespace App\Modules\V1\Email\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 */
class EmailResource extends JsonResource
{


    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'contact' => $this->contact,
        ];
    }
}
