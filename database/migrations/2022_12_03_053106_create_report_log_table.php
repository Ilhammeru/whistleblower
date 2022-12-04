<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('report_id')
                ->constrained('report')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('message');
            $table->tinyInteger('type')->comment('1 from user, 2 from investigator');
            $table->integer('receiver_id')->nullable();
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
        Schema::table('report_log', function(Blueprint $table) {
            $table->dropForeign(['report_id']);
        });
        Schema::dropIfExists('report_log');
    }
}
