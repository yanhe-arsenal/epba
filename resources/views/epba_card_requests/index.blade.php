@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New ePBA Card
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New ePBA Card Form -->
                    <form action="/epba_card_request" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- ePBA reciept email address -->
                        <div class="form-group">
                            <label for="epba_card_request-recipient_email" class="col-sm-3 control-label">Recipient's Email Address</label>

                            <div class="col-sm-6">
                                <input type="text" name="recipient_email" id="epba_card_request-recipient_email" class="form-control" value="{{ old('epba_card_request') }}">
                            </div>
                        </div>

                        <!-- Add Send Card Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Send ePBA Card
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Cards -->
            @if (count($epba_card_requests) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current ePBA Cards
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped epba_card_request-table">
                            <thead>
                                <th>Recipient Email Address</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($epba_card_requests as $epba_card_request)
                                    <tr>
                                        <td class="table-text"><div>{{ $epba_card_request->recipient_email }}</div></td>

                                        <!-- Delete Button -->
                                        <td>
                                            <form action="/epba_card_request/{{ $epba_card_request->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-epba_card_request-{{ $epba_card_request->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
