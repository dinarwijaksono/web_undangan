<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_demos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id');
            $table->foreignId('category_id');
            $table->string('page_code')->unique();
            $table->string('link');
            $table->string('name');
            $table->integer('price');
            $table->json('img_tumb');
            $table->bigInteger('event_date');
            $table->bigInteger('created_at');
            $table->bigInteger('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_demos');
    }
}
