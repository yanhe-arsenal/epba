<?php

namespace App\Http\Controllers;

use App;
use Log;
use Mail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Epba_card_request;
use App\Repositories\Epba_card_requestRepository;

use Illuminate\Database\Eloquent\ModelNotFoundException;


class Epba_card_requestController extends Controller
{
   /**
     * The epba card request repository instance.
     *
     * @var Epba_card_requestRepository
     */
    protected $epba_card_requests;

    /**
     * Create a new controller instance.
     *
     * @param  Epba_card_requestRepository  $epba_card_requests
     * @return void
     */
    public function __construct(Epba_card_requestRepository $epba_card_requests)
    {
        $this->middleware('auth');

        $this->epba_card_requests = $epba_card_requests;
    }

    /**
     * Display a list of all of the user's epba card request.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('epba_card_requests.index', [
            'epba_card_requests' => $this->epba_card_requests->forUser($request->user()),
        ]);
    }

    /**
     * Create a new epba card request.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'recipient_email' => 'required|unique:epba_card_requests|email',
        ]);

        $request->user()->epba_card_requests()->create([
            'recipient_email' => $request->recipient_email,
        ]);
	
	$data = array(
		'detail'=>'Your awesome detail here',
		'name'	=> 'He Yan',
	);

	$pdf = App::make('dompdf');
	$pdf = PDF::loadView('emails.welcome', $data);
	

	Mail::send('emails.welcome', $data, function ($message) {
  		$message->from('myepbaco@myepba.com', 'Site Admin');
  		$message->to('yanhe790926@hotmail.com')->subject('Welcome to My ePBA website!');
		$message->attachData($pdf->output(), "card.pdf");
	});

	return redirect('/epba_card_requests');
    }

    /**
     * Destroy the given epba card request.
     *
     * @param  Request  $request
     * @param  Epba_card_request  $epba_card_request
     * @return Response
     */

    public function destroy(Request $request, Epba_card_request $epba_card_request)
    {
	Log::info('Showing user profile for user: '.$epba_card_request);
       	$this->authorize('destroy', $epba_card_request);
        
	$epba_card_request->delete();
        return redirect('/epba_card_requests');

	}
}
