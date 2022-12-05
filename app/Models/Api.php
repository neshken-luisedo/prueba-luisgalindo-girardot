<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Api extends Model
{
    use HasFactory;

    protected $fillable = [
        'consecutive',
        'monitor_id',
        'activity_name',
        'activity_date',
        'start_time',
        'final_hour',
        'expertise_id',
        'nac_id',
        'cultural_right_id'
    ];

    protected $date  = [
        'activity_date' => 'Y-m-d',
    ];

    public function monitor()
    {
        return $this->belongsTo(User::class);
    }

    public function expertise()
    {
        return $this->belongsTo(Expertises::class);
    }

    public function nac()
    {
        return $this->belongsTo(Nacs::class);
    }

    public function cultural_right()
    {
        return $this->belongsTo(CulturalRights::class);
    }


    public function setActivityNameAttribute($value)
    {
        $this->attributes['activity_name']=mb_strtoupper(trim($value));
    }

    public function setActivityDateAttribute($value)
    {
        $this->attributes['activity_date'] = Carbon::parse($value)->format('Y-m-dd');
    }



    public function getPublishedAtAttribute()
    {
        return $this->created_at->format('Y-mm-dd');
    }

    public function getStartAttribute()
    {
        return $start = Carbon::parse($this->start_time)->format('h:i a');   
    }

    public function getEndAttribute()
    {
        return $final = Carbon::parse($this->final_hour)->format('h:i a');   
    }

    public function getMonitorNameAttribute()
    {
        return mb_strtoupper($this->monitor->name);
    }

    public function getExpertisesAttribute()
    {
        return $this->expertise->name;
    }

    public function getOrigenAttribute()
    {
        return $this->nac->name;
    }

    public function getCulturalAttribute()
    {
        return $this->cultural_right->name;
    }
}
