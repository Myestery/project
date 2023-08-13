<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->string("address", 100);
            $table->foreignId("state_id")->constrained("states");
            $table->string("country", 10)->default("NGA");
            $table->float("rating", 2, 1)->default(0.0);
            $table->integer("min_price")->default(0);
            $table->integer("max_price")->default(0);
            $table->string("phone", 20);
            $table->string("email", 100);
            $table->string("website");
            $table->json("images");
            $table->string("logo", 100);
            $table->string("description", 100);
            $table->string("status", 10)->default("active");
            $table->string("city", 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
