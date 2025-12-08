<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OptionType extends Model
{
    use SoftDeletes;
    protected $table = 'option_types';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
