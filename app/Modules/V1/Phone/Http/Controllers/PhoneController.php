<?php

namespace App\Modules\V1\Phone\Http\Controllers;

use App\Modules\V1\Phone\DTO\PhoneCreateDTO;
use App\Modules\V1\Phone\DTO\PhoneGetAllDTO;
use App\Http\Controllers\V1\BaseApiController;
use App\Modules\V1\Phone\Http\Requests\PhoneCreateRequest;
use App\Modules\V1\Phone\Http\Resources\PhoneResource;
use App\Modules\V1\Phone\Http\Resources\PhoneGetAllCollection;
use App\Modules\V1\Phone\Repositories\Contracts\IPhoneReadRepository;
use App\Modules\V1\Phone\Repositories\Contracts\IPhoneWriteRepository;

/**
 */
class PhoneController extends BaseApiController
{

    protected $read;
    protected $write;

    public function __construct(IPhoneReadRepository $read, IPhoneWriteRepository $write)
    {
        $this->read = $read;
        $this->write = $write;
    }

    public function all(PhoneGetAllDTO $request)
    {
        return new PhoneGetAllCollection($this->read->get($request->getDTO()));
    }

    public function show($id)
    {
        $data = $this->read->getByID($id);
        if ($data !== null) {
            return $this->responseWithData(new PhoneResource($data));
        } else {
            return $this->responseWithMessage(404);
        }
    }

    public function create(PhoneCreateDTO  $request, PhoneCreateRequest $data)
    {
        $result = $this->write->create($request);
        if ($result["status"]) {
            return $this->responseWithData(new PhoneResource($result["data"]), 201);
        } else {
            return $this->responseWithMessage(500);
        }
    }

    public function updateContent(PhoneCreateDTO $request, $id, PhoneCreateRequest $data)
    {
        $result = $this->write->updateContent($request, $id);
        if ($result["status"]) {
            return $this->responseWithData(new PhoneResource($result["data"]), 202);
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
