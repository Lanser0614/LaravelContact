<?php

namespace App\Modules\V1\Phone\Repositories\Contracts;

/**
 */
interface IPhoneWriteRepository
{
    public function create($data);

    public function updateContent($data, $id);

    public function delete($id);

}

