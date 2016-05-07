<?php

namespace App\Http\Controllers;

use App;
use Log;
use Mail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Epba_card_request;
use App\Epba_card;
use App\Repositories\Epba_card_requestRepository;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Epba_cardController extends Controller
{

    /**
     * Create a new epba card.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'card_recipient_email' => 'required|unique:epba_cards|email',
        ]);

        Epba_card::create([
            'card_recipient_email' => $request->card_recipient_email,
            'card_recipient_last_name' => $request->card_recipient_last_name,
            'card_recipient_first_name' => $request->card_recipient_first_name,
        ]);
	
    }

}
