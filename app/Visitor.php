<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    //
    protected $fillable  = ['name', 'company','contact_person','gate_pass_id','reason'];
}
