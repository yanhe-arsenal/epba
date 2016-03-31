<?php

namespace App;


use App\User;
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];

    /**
     * Get the user that owns the epba card request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
	
}
