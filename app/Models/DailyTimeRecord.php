<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DailyTimeRecord extends Model
{
    use HasFactory;

    protected $table = 'daily_time_record';
    protected $fillable = ['user_id', 'date_time'];

}
