<?php

namespace App\Modules\V1\Contact\Repositories\Contracts;

/**
 */
interface IContactReadRepository
{
    public function get($data);

    public function getByID($id);

}

