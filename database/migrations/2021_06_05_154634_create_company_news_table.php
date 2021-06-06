<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id");
            $table->foreignId("news_id");
            $table->timestamps();
            $table->foreign("company_id")
                ->references("id")
                ->on("companies")
                ->onDelete("cascade");
            $table->foreign("news_id")
                ->references("id")
                ->on("news")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_news');
    }
}
