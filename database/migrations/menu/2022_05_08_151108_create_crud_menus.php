<?php

use Database\Seeders\menu\SeederMenuCreate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrudMenus extends Migration
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
            Log::info("Generating Migration Menu");

            Schema::create('crud_menus', function (Blueprint $table) {
                $table->id();
                $table->text('title');
                $table->text('url');

                $table->timestamps();
                $table->softDeletes();
            });

            Artisan::call('db:seed', array('--class' => SeederMenuCreate::class));

            Log::info("Finish Generating Migration Menu");
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
        Schema::dropIfExists('crud_menus');
    }
}
