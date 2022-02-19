<?php

namespace App\Modules\V1\Contact\Repositories;

use App\Modules\V1\Contact\Models\Contact;
use App\Modules\V1\Contact\Filter\ContactFilter;
use App\Modules\V1\Contact\Repositories\Contracts\IContactReadRepository;

/**
 */
class ContactReadRepository  implements IContactReadRepository
{

    // public function all($data)
    // {
    //   return $contact_name = (
    //         new ContactFilter($this->model::query()->orderBy(
    //             $data['request']->has('orderBy')? $data['request']->orderBy: 'id',
    //             $data['request']->has('orderType')?
    //                 ($data['request']->orderType == 1)? 'ASC': 'DESC'
    //                 : 'DESC'),
    //             $data['request']))->apply()
    //         ->paginate(isset($data['perPage']) ? $data['perPage']: 15);

    // }


    protected $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function get($data)
    {

            $contact_name = (
            new ContactFilter($this->model::query()->orderBy(
                $data['request']->has('orderBy')? $data['request']->orderBy: 'id',
                $data['request']->has('orderType')?
                    ($data['request']->orderType == 1)? 'ASC': 'DESC'
                    : 'DESC'),
                $data['request']))->apply()
            ->paginate(isset($data['perPage']) ? $data['perPage']: 15);
       return $contact_name;
        //  return $this->model::all();
    }

    public function getById($id)
    {
        return $this->model::all()->find($id);
    }
}
