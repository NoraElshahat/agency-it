<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Ticket extends Model
{
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
