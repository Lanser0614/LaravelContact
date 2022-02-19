<?php

namespace App\Modules\V1\Email\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 */
class EmailGetAllCollection extends ResourceCollection
{


    public function toArray($request): array
    {
        return [
            "message" => "success",
            "data" => EmailResource::collection($this->collection)
        ];
    }
}
