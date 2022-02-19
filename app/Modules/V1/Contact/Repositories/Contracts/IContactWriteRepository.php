<?php

namespace App\Modules\V1\Contact\Repositories\Contracts;

/**
 */
interface IContactWriteRepository
{
    public function create($data);

    public function updateContent($data, $id);

    public function delete($id);

}

