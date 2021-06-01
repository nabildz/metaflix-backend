<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('tmbd_id');
            $table->tinyInteger('tmbd_vote_average');
            $table->string('language');
            $table->string('title');
            $table->string('image_url');
            $table->date('release_date');
            $table->enum('status', ['is_watched', 'in_wishlist']);
            $table->enum('rating', ['yay', 'nay'])->nullable();
            $table->string('review')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
