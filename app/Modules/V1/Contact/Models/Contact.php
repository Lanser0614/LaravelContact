<?php

namespace App\Modules\V1\Contact\Models;

use App\Modules\V1\Email\Models\Email;
use App\Modules\V1\Phone\Models\Phone;
use Illuminate\Database\Eloquent\Model;;

/**
 */
class Contact extends Model
{

    protected $table = 'contacts';
    protected $connection  ;
    protected $fillable = [ 'contact_name' ];


    public function phones(){
        return $this->hasMany(Phone::class);
    }

    public function emails(){
        return $this->hasMany(Email::class);
    }

}

