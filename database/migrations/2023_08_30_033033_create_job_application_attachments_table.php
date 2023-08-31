<?php

use App\Models\JobApplication;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_application_attachments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignIdFor(JobApplication::class, 'job_application_id')->constrained('job_applications');
            $table->string('path');
            $table->string('filename');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_application_attachments');
    }
};
