<?php

namespace App\Modules\V1\Email\Repositories;

use App\Modules\V1\Email\Repositories\Contracts\IEmailWriteRepository;
use App\Modules\V1\Email\Models\Email;

/**
 */
class EmailWriteRepository  implements IEmailWriteRepository
{

    protected $model;

    public function __construct(Email $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        $Email =  $this->model::create($data->getEmail());
        return ["status" => true, "data" => $Email];
    }

    public function updateContent($data, $id)
    {
        $Email = $this->model::all()->find($id);
        if ($Email) {
            $Email->update($data->getEmail());
            return ["status" => true, "data" => $Email];
        }
        return ["status" => false, "data" => $Email];
    }

    public function delete($id)
    {
        $Email = $this->model::all()->find($id);
        if ($Email) {
            $Email->delete();
            return ["status" => true];
        }
        return ["status" => false, "data" => $Email];
    }
}
