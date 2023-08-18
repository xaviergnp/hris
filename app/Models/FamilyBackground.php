<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyBackground extends Model
{
    use HasFactory;

    protected $table = 'family_background';

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
