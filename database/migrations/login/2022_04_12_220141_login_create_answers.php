<?php

use Database\Seeders\login\SeederLoginCreateAnswers;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class LoginCreateAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws Throwable
     */
    public function up(): void
    {
        try {
            Log::info("Generating Migration LoginCreateQuestion");

            Schema::create('answers', function (Blueprint $table) {
                $table->id();
                $table->integer('question_id');
                $table->text('title');
                $table->integer('is_correct');

                $table->timestamps();
                $table->softDeletes();
            });

            Artisan::call('db:seed', array('--class' => SeederLoginCreateAnswers::class));

            Log::info("Finish Generating Migration LoginCreateQuestion");
        }catch(Exception $exception){
            Log::error(exception_to_string($exception));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
}
