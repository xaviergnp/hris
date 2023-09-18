<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RewardAndRecognition extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'points'];

    public function employee() : HasMany {
        return $this->hasMany(EmployeeReward::class, 'user_id');
    }
}
