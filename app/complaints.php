<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class complaints extends Model
{
    //define expected input values to model...
    protected $fillable=['title','description','user_id','admin_id','action_time'];

}
