<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
