<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    const CREATED_AT = 'date';
    const UPDATED_AT = 'chdate';
    protected $table = 'contact';
}
