<?php

namespace App\Modules\V1\Email\DTO;

use App\DTO\BaseDTO;
use App\Modules\V1\Email\Http\Requests\EmailCreateRequest;

/**
 */
class EmailCreateDTO extends BaseDTO
{


    public function __construct(EmailCreateRequest $request)
    {
        parent::__construct($request);
    }

    public function getEmail(){
        return [
            'contact_id' => $this->request->contact_id,
            'email' => $this->request->email
        ];
    }
}
