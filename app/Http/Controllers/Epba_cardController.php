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
            'card_recipient_last_name' => 'required',
            'card_recipient_first_name' => 'required',
            'card_recipient_birthday' => 'required|date|date_format:Y-m-d',
            'card_recipient_email' => 'required|unique:epba_cards|email',
            'card_recipient_phone_number' => 'required',
            'card_recipient_address' => 'required',
        ]);

        Epba_card::create([
            'card_recipient_email' => $request->card_recipient_email,
            'card_recipient_last_name' => $request->card_recipient_last_name,
            'card_recipient_first_name' => $request->card_recipient_first_name,
            'card_recipient_birthday' => $request->card_recipient_birthday,
            'card_recipient_phone_number' => $request->card_recipient_phone_number,
            'card_recipient_address' => $request->card_recipient_address,
	    'card_request_id' => $request->card_request_id,
        ]);
	
    }

}
