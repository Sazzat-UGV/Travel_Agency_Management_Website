<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageAmenity extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function amenity(){
        return $this->belongsTo(Amenity::class);
    }
}
