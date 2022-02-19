<?php

namespace App\Modules\V1\Phone\Repositories;

use App\Modules\V1\Phone\Filter\PhoneFilter;
use App\Modules\V1\Phone\Repositories\Contracts\IPhoneReadRepository;
use App\Modules\V1\Phone\Models\Phone;

/**
 */
class PhoneReadRepository  implements IPhoneReadRepository
{

    protected $model;

    public function __construct(Phone $model)
    {
        $this->model = $model;
    }

    public function get($data)
    {
        return $phone = (
            new PhoneFilter($this->model::query()->orderBy(
                $data['request']->has('orderBy')? $data['request']->orderBy: 'id',
                $data['request']->has('orderType')?
                    ($data['request']->orderType == 1)? 'ASC': 'DESC'
                    : 'DESC'),
                $data['request']))->apply()
            ->paginate(isset($data['perPage']) ? $data['perPage']: 15);
        // return $this->model::all();
    }

    public function getById($id)
    {
        return $this->model::all()->find($id);
    }
}
