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
        Schema::create('page_four_questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignIdFor(User::class, 'user_id')->constrained('users');
            $table->string('thirty_four_a', 255)->nullable();
            $table->string('thirty_four_b', 255)->nullable();
            $table->string('thirty_four_a_b_if_yes', 255)->nullable();
            $table->string('thirty_five_a', 255)->nullable();
            $table->string('thirty_five_a_if_yes', 255)->nullable();
            $table->string('thirty_five_b', 255)->nullable();
            $table->string('thirty_five_b_if_yes_date', 255)->nullable();
            $table->string('thirty_five_b_if_yes_case', 255)->nullable();
            $table->string('thirty_six', 255)->nullable();
            $table->string('thirty_six_if_yes', 255)->nullable();
            $table->string('thirty_seven', 255)->nullable();
            $table->string('thirty_seven_if_yes', 255)->nullable();
            $table->string('thirty_eight_a', 255)->nullable();
            $table->string('thirty_eight_a_if_yes', 255)->nullable();
            $table->string('thirty_eight_b', 255)->nullable();
            $table->string('thirty_eight_b_if_yes', 255)->nullable();
            $table->string('thirty_nine', 255)->nullable();
            $table->string('thirty_nine_if_yes', 255)->nullable();
            $table->string('fourty_a', 255)->nullable();
            $table->string('fourty_a_if_yes', 255)->nullable();
            $table->string('fourty_b', 255)->nullable();
            $table->string('fourty_b_if_yes', 255)->nullable();
            $table->string('fourty_c', 255)->nullable();
            $table->string('fourty_c_if_yes', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_four_questions');
    }
};
