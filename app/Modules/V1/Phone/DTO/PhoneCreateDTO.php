<?php

namespace App\Modules\V1\Phone\DTO;

use App\DTO\BaseDTO;
use App\Modules\V1\Phone\Http\Requests\PhoneCreateRequest;

/**
 */
class PhoneCreateDTO extends BaseDTO
{


    public function __construct(PhoneCreateRequest $request)
    {
        parent::__construct($request);
    }

    public function getPhone(){
        return [
            'contact_id' => $this->request->contact_id,
            'phone_number' => $this->request->phone_number
        ];
    }
}
