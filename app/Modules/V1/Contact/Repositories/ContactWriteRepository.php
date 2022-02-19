<?php

namespace App\Modules\V1\Contact\Repositories;

use App\Modules\V1\Contact\Repositories\Contracts\IContactWriteRepository;
use App\Modules\V1\Contact\Models\Contact;

/**
 */
class ContactWriteRepository  implements IContactWriteRepository
{

    protected $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {

        $Contact =  $this->model::create($data->getContactName());
        return ["status" => true, "data" => $Contact];
    }

    public function updateContent($data, $id)
    {
        $Contact = $this->model::all()->find($id);
        if ($Contact) {
            $Contact->update($data->getContactName());
            return ["status" => true, "data" => $Contact];
        }
        return ["status" => false, "data" => $Contact];
    }

    public function delete($id)
    {
        $Contact = $this->model::all()->find($id);
        if ($Contact) {
            $Contact->delete();
            return ["status" => true];
        }
        return ["status" => false, "data" => $Contact];
    }
}
