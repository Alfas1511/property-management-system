<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserConvertRequest extends Model
{
    protected $table = 'user_convert_requests';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
