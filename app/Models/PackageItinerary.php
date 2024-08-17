<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageItinerary extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function itinerary(){
        return $this->belongsTo(Package::class);
    }
}
