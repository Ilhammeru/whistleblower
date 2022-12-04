<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_description', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('report_id')
                ->constrained('report')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('description');
            $table->boolean('is_additional')->default(false);
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
        Schema::table('report_description', function(Blueprint $table) {
            $table->dropForeign(['report_id']);
        });
        Schema::dropIfExists('report_description');
    }
}
