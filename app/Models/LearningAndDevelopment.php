<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LearningAndDevelopment extends Model
{
    use HasFactory;

    protected $table = 'learning_and_development';

    protected $fillable = [
        "title_of_learning",
        "inclusive_date_from",
        "inclusive_date_to",
        "number_of_hours",
        "type_of_ld",
        "conducted_sponsored_by",
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
