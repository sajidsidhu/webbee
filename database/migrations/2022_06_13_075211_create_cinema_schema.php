<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaSchema extends Migration
{
    /** ToDo: Create a migration that creates all tables for the following user stories

    For an example on how a UI for an api using this might look like, please try to book a show at https://in.bookmyshow.com/.
    To not introduce additional complexity, please consider only one cinema.

    Please list the tables that you would create including keys, foreign keys and attributes that are required by the user stories.

    ## User Stories

     **Movie exploration**
     * As a user I want to see which films can be watched and at what times
     * As a user I want to only see the shows which are not booked out

     **Show administration**
     * As a cinema owner I want to run different films at different times
     * As a cinema owner I want to run multiple films at the same time in different showrooms

     **Pricing**
     * As a cinema owner I want to get paid differently per show
     * As a cinema owner I want to give different seat types a percentage premium, for example 50 % more for vip seat

     **Seating**
     * As a user I want to book a seat
     * As a user I want to book a vip seat/couple seat/super vip/whatever
     * As a user I want to see which seats are still available
     * As a user I want to know where I'm sitting on my ticket
     * As a cinema owner I dont want to configure the seating for every show
     */
    public function up()
    {
        Schema::create('movies',function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamp('start_at');
            $table->boolean('full');
            $table->timestamps();
        });

        Schema::create('show',function(Blueprint $table){
            $table->id();
            $table->integer('movie_id');
            $table->timestamp('show_datetime');
            $table->integer('total_seats');
            $table->integer('available_seats');
            $table->string('showroom');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });

        Schema::create('pricing',function(Blueprint $table){
            $table->id();
            $table->integer('show_id');
            $table->integer('price');
            $table->integer('vip_percentage');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });

        

        Schema::create('seats',function(Blueprint $table){
            $table->id();
            $table->integer('show_id');
            $table->integer('price_id');
            $table->integer('user_id');
            $table->string('seat_type');
            $table->integer('seat_number');
            $table->integer('vip_percentage');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });



        // throw new \Exception('implement in coding task 4, you can ignore this exception if you are just running the initial migrations.');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
        Schema::dropIfExists('show');
        Schema::dropIfExists('pricing');
        Schema::dropIfExists('seats');
    }
}
