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
	
	$card_request = Epba_card_request::where('recipient_email', $request->recipient_email)->first();
	$card_request_id = $card_request->id;

	$email_data = array(
		'detail'=>'Please follow the URL (http://myepba.com/epba_card_generation/$card_request_id) to print the PDF of your ePBA card. ',
	);

	/*
        *$data =  [
        *    'quantity'      => '1' ,
        *    'description'   => 'some ramdom text',
        *    'price'   => '500',
        *    'total'     => '500'
        *];
        *$date = date('Y-m-d');
        *$invoice = "2222";
        *$view =  \View::make('pdf.card', compact('data', 'date', 'invoice'))->render();
        *$pdf = \App::make('dompdf.wrapper');
        *$pdf->loadHTML($view);
	*
	*Mail::send('emails.welcome', $email_data, function ($message) use ($pdf, $request) {
  	*	$message->from('myepbaco@myepba.com', 'Site Admin');
  	*	$message->to($request->recipient_email)->subject('Welcome to My ePBA website!');
	*	$message->attachData($pdf->output(), "ePBA_card.pdf");
	*});
	*/
	Mail::send('emails.welcome', $email_data, function ($message) use ($request) {
		$message->from('myepbaco@myepba.com', 'Site Admin');
		$message->to($request->recipient_email)->subject('Welcome to My ePBA website!');
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
