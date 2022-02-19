<?php

namespace App\Modules\V1\Email\Filter;

use App\Filter\QueryFilter;

class EmailFilter extends QueryFilter
{
    public function contact_name($value){
           $this->builder->whereHas('contact', function ($query) use ($value){
            $query->where('contact_name', 'like', "%$value%");
        });
    }


    public function emails($value){
        $this->builder->where('email', 'like', "%$value%");
    }
}
