<?php

namespace App\Modules\V1\Contact\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 */
class ContactGetAllCollection extends ResourceCollection
{


    public function toArray($request): array
    {
        return [
            "message" => "success",
            "data" => ContactResource::collection($this->collection)
        ];
    }
}
