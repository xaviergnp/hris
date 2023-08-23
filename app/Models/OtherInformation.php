<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OtherInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'special_skills_hobbies',
        'none_academic_distinctions',
        'membership_in_assoc_org',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
