<?php

namespace App\Modules\V1\Contact\Http\Controllers;

use App\Http\Controllers\V1\BaseApiController;
use App\Modules\V1\Contact\DTO\ContactCreateDTO;
use App\Modules\V1\Contact\DTO\ContactGetAllDTO;
use App\Modules\V1\Contact\Http\Requests\ContactCreateRequest;
use App\Modules\V1\Contact\Http\Resources\ContactResource;
use App\Modules\V1\Contact\Http\Resources\ContactGetAllCollection;
use App\Modules\V1\Contact\Repositories\Contracts\IContactReadRepository;
use App\Modules\V1\Contact\Repositories\Contracts\IContactWriteRepository;

/**
 */
class ContactController extends BaseApiController
{

    protected $read;
    protected $write;

    public function __construct(IContactReadRepository $read, IContactWriteRepository $write)
    {
        $this->read = $read;
        $this->write = $write;
    }


    public function all(ContactGetAllDTO $request)
    {
        return new ContactGetAllCollection($this->read->get($request->getDTO()));
    }


    public function show($id)
    {
        $data = $this->read->getByID($id);
        if ($data !== null) {
            return $this->responseWithData(new ContactResource($data));
        } else {
            return $this->responseWithMessage(404);
        }
    }


    public function create(ContactCreateDTO  $request, ContactCreateRequest $data)
    {
        $result = $this->write->create($request);
        if ($result["status"]) {
            return $this->responseWithData(new ContactResource($result["data"]), 201);
        } else {
            return $this->responseWithMessage(500);
        }
    }


    public function updateContent(ContactCreateDTO $request, $id, ContactCreateRequest $data)
    {
        $result = $this->write->updateContent($request, $id);
        if ($result["status"]) {
            return $this->responseWithData(new ContactResource($result["data"]), 202);
        } else {
            return $this->responseWithMessage(500);
        }
    }


    public function delete($id)
    {
        $result = $this->write->delete($id);
        if ($result["status"]) {
            return $this->responseWithMessage(202);
        } else {
            return $this->responseWithMessage(500);
        }
    }

}
