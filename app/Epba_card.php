<?php

namespace App;

Use App\Epba_card_request;
use Illuminate\Database\Eloquent\Model;

class Epba_card extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['card_recipient_last_name', 'card_recipient_first_name', 'card_recipient_email', 'card_recipient_phone_number', 'card_recipient_birthday', 'card_recipient_address', 'card_request_id'];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'card_request_id' => 'int',
    ];

    /**
     * Get the corresponding car request
     */
    public function epba_card_request()
    {
        return $this->belongsTo(Epba_card_request::class);
    }
}
