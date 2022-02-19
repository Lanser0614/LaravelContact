<?php

namespace App\Modules\V1\Phone\Filter;

use App\Filter\QueryFilter;

class PhoneFilter extends QueryFilter
{



    public function contact_name($value){
        $this->builder->whereHas('contact', function ($query) use ($value){
         $query->where('contact_name', 'like', "%$value%");
     });
 }

 public function phones($value){
     $this->builder->where('phone_number', 'like', "%$value%");
 }

}
