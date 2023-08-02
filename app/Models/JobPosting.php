<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = ['by_user_id', 'place_of_assignment', 'position', 'plantilla_item_no', 'salary_grade', 'monthly_salary', 'eligibility', 'education', 'training', 'work_experience', 'competency', 'posting_date', 'closing_date'];

    public function encoder() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
