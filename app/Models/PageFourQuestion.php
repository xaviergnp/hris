<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageFourQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'thirty_four_a',
        'thirty_four_b',
        'thirty_four_a_b_if_yes',
        'thirty_five_a',
        'thirty_five_a_if_yes',
        'thirty_five_b',
        'thirty_five_b_if_yes_date',
        'thirty_five_b_if_yes_case',
        'thirty_six',
        'thirty_six_if_yes',
        'thirty_seven',
        'thirty_seven_if_yes',
        'thirty_eight_a',
        'thirty_eight_a_if_yes',
        'thirty_eight_b',
        'thirty_eight_b_if_yes',
        'thirty_nine',
        'thirty_nine_if_yes',
        'fourty_a',
        'fourty_a_if_yes',
        'fourty_b',
        'fourty_b_if_yes',
        'fourty_c',
        'fourty_c_if_yes',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
