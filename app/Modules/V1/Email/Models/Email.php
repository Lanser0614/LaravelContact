<?php

namespace App\Modules\V1\Email\Models;

use App\Modules\V1\Contact\Models\Contact;
use Illuminate\Database\Eloquent\Model;;

/**
 */
class Email extends Model
{

    protected $table = 'emails';
    protected $connection  ;
    protected $fillable = [ 'contact_id', 'email' ];


    public function contact(){
        return $this->belongsTo(Contact::class);
    }

}

