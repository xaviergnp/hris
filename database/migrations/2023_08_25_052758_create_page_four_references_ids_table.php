<?php

use App\Models\User;
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
        Schema::create('page_four_references_id', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignIdFor(User::class, 'user_id')->constrained('users');

            $table->string('references_name_one', 255)->nullable();
            $table->string('references_address_one', 255)->nullable();
            $table->string('references_telephone_one', 255)->nullable();
            $table->string('references_name_two', 255)->nullable();
            $table->string('references_address_two', 255)->nullable();
            $table->string('references_telephone_two', 255)->nullable();
            $table->string('references_name_three', 255)->nullable();
            $table->string('references_address_three', 255)->nullable();
            $table->string('references_telephone_three', 255)->nullable();
            $table->string('government_issued_id', 255)->nullable();
            $table->string('id_license_passport_number', 255)->nullable();
            $table->string('date_place_of_issuance', 255)->nullable();
            $table->string('co_government_issued_id', 255)->nullable();
            $table->string('co_id_license_passport_number', 255)->nullable();
            $table->string('co_date_place_of_issuance', 255)->nullable();
            $table->string('photo', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_four_references_id');
    }
};
