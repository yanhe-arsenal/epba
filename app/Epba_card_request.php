<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Epba_card_request extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['recipient_email'];

    /**
     * Get the user that owns the epba card request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
	
}
