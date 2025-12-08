<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;
    protected $table = 'properties';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function optionType()
    {
        return $this->belongsTo(OptionType::class);
    }

    public function propertyImages()
    {
        return $this->hasMany(PropertyImage::class);
    }
}
