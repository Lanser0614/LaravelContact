<?php

namespace App\Modules\V1\Phone\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\V1\Contact\Models\Contact;



class Phone extends Model
{

    protected $table = 'phones';
    protected $connection;
    protected $fillable = [
        "contact_id",
        "phone_number",
    ];

    public function contact(){
        return $this->belongsTo(Contact::class);
    }

}
