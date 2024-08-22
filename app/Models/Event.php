<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'location',
    ];

    /**
     * Get the time attribute in 12-hour format with AM/PM.
     *
     * @param  string  $value
     * @return string
     */
    public function getFormatTimeAttribute($value)
    {
        return Carbon::parse($value)->format('h:i A');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

}
