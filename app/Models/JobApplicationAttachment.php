<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplicationAttachment extends Model
{
    use HasFactory;
    protected $fillable = ['filename', 'path'];
    protected $appends = ['src'];

    public function job_application() : BelongsTo
    {
        return $this->belongsTo(JobApplication::class);
    }

    public function getSrcAttribute()
    {
        return asset("storage/{$this->path}");
    }
}
