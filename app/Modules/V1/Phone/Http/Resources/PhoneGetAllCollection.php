<?php

namespace App\Modules\V1\Phone\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 */
class PhoneGetAllCollection extends ResourceCollection
{


    public function toArray($request): array
    {
        return [
            "message" => "success",
            "data" => PhoneResource::collection($this->collection)
        ];
    }
}
