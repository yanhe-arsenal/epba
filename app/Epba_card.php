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
    protected $fillable = ['card_recipient_last_name'];
    protected $fillable = ['card_recipient_first_name'];
    protected $fillable = ['card_recipient_email'];
    protected $fillable = ['card_recipient_phone_number'];
    protected $fillable = ['card_recipient_birthday'];
    protected $fillable = ['card_recipient_address'];

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
