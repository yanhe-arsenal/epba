<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpbaCardRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epba_card_requests', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('user_id')->index();		
            $table->timestamps();
	    $table->string('recipient_email');	
	    $table->integer('card_generated_flag')->default(0);	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('epba_card_requests');
    }
}
