<?php

namespace App\Modules\V1\Contact\Filter;

use App\Filter\QueryFilter;

class ContactFilter extends QueryFilter
{
    public function contact_name($value){
        $this->builder->where('contact_name', 'like', "%$value%");
    }

    public function phones($value){
        $this->builder->whereHas('phones', function ($query) use ($value){
            $query->where('phone_number', 'like', "%$value%");
        });
    }

    public function emails($value){
        $this->builder->whereHas('emails', function ($query) use ($value){
            $query->where('email', 'like', "%$value%");
        });
    }
}
