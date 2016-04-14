<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpbaCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epba_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('card_request_id');
            $table->integer('card_id');
            $table->timestamps();
            $table->string('card_recipient_last_name');
            $table->string('card_recipient_first_name');
            $table->string('card_recipient_email');
            $table->string('card_recipient_phone_number');
            $table->string('card_recipient_birthday');
            $table->string('card_recipient_address');
            $table->integer('card_usage')->default(0);
            $table->index(['user_id', 'card_id', 'card_request_id']);		
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('epba_cards');
    }
}
