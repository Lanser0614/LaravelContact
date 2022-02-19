<?php

namespace App\Modules\V1\Phone\Repositories\Contracts;

/**
 */
interface IPhoneReadRepository
{
    public function get($data);

    public function getByID($id);

}

