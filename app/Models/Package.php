<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function destination(){
        return $this->belongsTo(Destination::class);
    }

    public function package_itineraries(){
        return $this->hasMany(PackageItinerary::class);
    }

    public function photos(){
        return $this->hasMany(PackagePhoto::class);
    }

    public function videos(){
        return $this->hasMany(PackageVideo::class);
    }
    public function faqs(){
        return $this->hasMany(PackageFaq::class);
    }
    public function tours(){
        return $this->hasMany(Tour::class);
    }
}
