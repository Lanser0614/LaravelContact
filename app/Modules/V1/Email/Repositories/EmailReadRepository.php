<?php

namespace App\Modules\V1\Email\Repositories;

use App\Modules\V1\Email\Filter\EmailFilter;
use App\Modules\V1\Email\Repositories\Contracts\IEmailReadRepository;
use App\Modules\V1\Email\Models\Email;

/**
 */
class EmailReadRepository  implements IEmailReadRepository
{

    protected $model;

    public function __construct(Email $model)
    {
        $this->model = $model;
    }

    public function get($data)
    {
        return $email = (
            new EmailFilter($this->model::query()->orderBy(
                $data['request']->has('orderBy')? $data['request']->orderBy: 'id',
                $data['request']->has('orderType')?
                    ($data['request']->orderType == 1)? 'ASC': 'DESC'
                    : 'DESC'),
                $data['request']))->apply()
            ->paginate(isset($data['perPage']) ? $data['perPage']: 15);
        //return $this->model::all();
    }

    public function getById($id)
    {
        return $this->model::all()->find($id);
    }
}
