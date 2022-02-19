<?php

namespace App\Modules\V1\Email\Repositories\Contracts;

/**
 */
interface IEmailReadRepository
{
    public function get($data);

    public function getByID($id);

}

