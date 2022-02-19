<?php

namespace App\Modules\V1\Contact\DTO;

use App\DTO\BaseDTO;
use App\Modules\V1\Contact\Http\Requests\ContactCreateRequest;

/**
 */
class ContactCreateDTO extends BaseDTO
{


    public function __construct(ContactCreateRequest $request)
    {
        parent::__construct($request);
    }

    public function getContactName(){
        return [
            'contact_name' =>    $this->request->contact_name
        ];
    }
}
