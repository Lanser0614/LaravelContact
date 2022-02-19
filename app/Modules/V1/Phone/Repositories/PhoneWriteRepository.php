<?php

namespace App\Modules\V1\Phone\Repositories;

use App\Modules\V1\Phone\Repositories\Contracts\IPhoneWriteRepository;
use App\Modules\V1\Phone\Models\Phone;

/**
 */
class PhoneWriteRepository  implements IPhoneWriteRepository
{

    protected $model;

    public function __construct(Phone $model)
    {
        $this->model = $model;
    }


    public function create($data)
    {
        $Phone =  $this->model::create($data->getPhone());
        return ["status" => true, "data" => $Phone];
    }


    public function updateContent($data, $id)
    {
        $Phone = $this->model::all()->find($id);
        if ($Phone) {
            $Phone->update($data->getPhone());
            return ["status" => true, "data" => $Phone];
        }
        return ["status" => false, "data" => $Phone];
    }


    public function delete($id)
    {
        $Phone = $this->model::all()->find($id);
        if ($Phone) {
            $Phone->delete();
            return ["status" => true];
        }
        return ["status" => false];
    }

}
