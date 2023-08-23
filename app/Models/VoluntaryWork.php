<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VoluntaryWork extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "name_address_of_org",
        "inclusive_date_from",
        "inclusive_date_to",
        "number_of_hours",
        "position_work",
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
