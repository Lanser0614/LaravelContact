<?php

namespace App\Modules\V1\Email\Repositories\Contracts;

/**
 */
interface IEmailWriteRepository
{
    public function create($data);

    public function updateContent($data, $id);

    public function delete($id);

}

