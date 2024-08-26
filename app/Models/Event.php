<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'location',
    ];

    public function getFormatTimeAttribute()
    {
        return Carbon::parse($this->time)->format('h:i A');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

}
