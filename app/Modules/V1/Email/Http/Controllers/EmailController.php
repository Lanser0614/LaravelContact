<?php

namespace App\Modules\V1\Email\Http\Controllers;

use App\Modules\V1\Email\DTO\EmailCreateDTO;
use App\Modules\V1\Email\DTO\EmailGetAllDTO;
use App\Http\Controllers\V1\BaseApiController;
use App\Modules\V1\Email\Http\Requests\EmailCreateRequest;
use App\Modules\V1\Email\Http\Resources\EmailResource;
use App\Modules\V1\Email\Http\Resources\EmailGetAllCollection;
use App\Modules\V1\Email\Repositories\Contracts\IEmailReadRepository;
use App\Modules\V1\Email\Repositories\Contracts\IEmailWriteRepository;

/**
 */
class EmailController extends BaseApiController
{

    protected $read;
    protected $write;

    public function __construct(IEmailReadRepository $read, IEmailWriteRepository $write)
    {
        $this->read = $read;
        $this->write = $write;
    }

    public function all(EmailGetAllDTO $request)
    {
        return new EmailGetAllCollection($this->read->get($request->getDTO()));
    }

    public function show($id)
    {
        $data = $this->read->getByID($id);
        if ($data !== null) {
            return $this->responseWithData(new EmailResource($data));
        } else {
            return $this->responseWithMessage(404);
        }
    }

    public function create(EmailCreateDTO  $request, EmailCreateRequest $data)
    {
        $result = $this->write->create($request);
        if ($result["status"]) {
            return $this->responseWithData(new EmailResource($result["data"]), 201);
        } else {
            return $this->responseWithMessage(500);
        }
    }

    public function updateContent(EmailCreateDTO $request, $id, EmailCreateRequest $data)
    {
        $result = $this->write->updateContent($request, $id);
        if ($result["status"]) {
            return $this->responseWithData(new EmailResource($result["data"]), 202);
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
