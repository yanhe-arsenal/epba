@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Generate ePBA Card
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New ePBA Card Form -->
                    <form action="/epba_card" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="epba_card-card_recipient_last_name" class="col-sm-3 control-label">Card Holder's Last Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="card_recipient_last_name" id="epba_card-card_recipient_last_name" class="form-control" value="{{ old('epba_card') }}">
                            </div>
                        </div>
                        
			<div class="form-group">
                            <label for="epba_card-card_recipient_first_name" class="col-sm-3 control-label">Card Holder's First Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="card_recipient_first_name" id="epba_card-card_recipient_first_name" class="form-control" value="{{ old('epba_card') }}">
                            </div>
                        </div>
			
			<div class="form-group">
                            <label for="epba_card-card_recipient_email" class="col-sm-3 control-label">Card Holder's Email Address</label>
                            <div class="col-sm-6">
                                <input type="text" name="card_recipient_email" id="epba_card-card_recipient_email" class="form-control" value="{{ old('epba_card') }}">
                            </div>
                        </div>
			
			<div class="form-group">
                            <label for="epba_card-card_request_id" class="col-sm-3 control-label">Card Request ID</label>
                            <div class="col-sm-6">
                                <input type="text" name="card_request_id" id="epba_card-card_request_id" class="form-control" value="<?php echo $request_id; ?>">
                            </div>
                        </div>

                        <!-- Add Send Card Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>generate ePBA Card
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
