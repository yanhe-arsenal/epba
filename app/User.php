<?php

namespace App;

use App\Task;
use App\Epba_card_request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the tasks for the user.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    
    /**
     * Get all of the epba card requests for the user.
     */
    public function epba_card_requests()
    {
        return $this->hasMany(Epba_card_request::class);
    }
}
