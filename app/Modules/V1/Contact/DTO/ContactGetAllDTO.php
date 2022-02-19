<?php

namespace App\Modules\V1\Contact\DTO;

use App\DTO\BaseDTO;
use App\Modules\V1\Contact\Http\Requests\ContactGetAllRequest;

/**
 */
class ContactGetAllDTO extends BaseDTO
{
    public $id;
    public $contact_name;
    public $perPage;
    public $page;

    public function __construct(ContactGetAllRequest $request)
    {
        parent::__construct($request);
    }

    public function getDTO()
    {
        if ($this->request->has("perPage")) {
            $this->perPage = $this->request->perPage;
        }
        if ($this->request->has("page")) {
            $this->page = $this->request->page;
        }
        if ($this->request->has("id")) {
            $this->id = $this->request->id;
        }
        if ($this->request->has("contact_name")) {
            $this->contact_name = $this->request->contact_name;
        }

        return (array) $this;
    }
}
