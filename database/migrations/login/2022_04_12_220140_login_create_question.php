<?php

use Database\Seeders\login\SeederLoginCreateQuestion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class LoginCreateQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws Throwable
     */
    public function up()
    {
        try {
            Log::info("Generating Migration LoginCreateQuestion");

            Schema::create('questions', function (Blueprint $table) {
                $table->id();
                $table->text('title');
                $table->text('category');
                $table->integer('rating');

                $table->timestamps();
                $table->softDeletes();
            });

            Artisan::call('db:seed', array('--class' => SeederLoginCreateQuestion::class));

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
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
