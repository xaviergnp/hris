<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function job_posting() : HasMany {
        return $this->hasMany(JobPosting::class, 'by_user_id');
    }

    public function personal_information() : HasOne {
        return $this->hasOne(PersonalInformation::class, 'user_id');
    }
    public function family_background() : HasOne {
        return $this->hasOne(FamilyBackground::class, 'user_id');
    }
    public function children() : HasMany {
        return $this->hasMany(Children::class, 'user_id');
    }
    public function educational_background() : HasOne {
        return $this->hasOne(EducationalBackground::class, 'user_id');
    }
    public function civil_service_eligibility() : HasMany {
        return $this->hasMany(CivilServiceEligibility::class, 'user_id');
    }
    public function work_experience() : HasMany {
        return $this->hasMany(WorkExperience::class, 'user_id');
    }
}
