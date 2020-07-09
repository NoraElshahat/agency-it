@extends('layouts.app')

@section('content')



@if($message = Session::get('success'))

                <div class="alert alert-success">{{ $message }}</div>
@endif

    <div class='container'>

    <a href="{{ route('ticket.sort') }}" class="btn btn-info mb-2">{{ __('message.sort') }}</a>
    <div class="row">
        @forelse($allTickets as $tickets)
            <div class="col-sm-6 col-md-4 col-lg-3 ml-2">
                <div class="card mt-2" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title"> {{ __('message.descTicket') }} : {{$tickets->description}}</h5>
                        <p class="card-text">{{ __('message.status') }} : {{$tickets->status}}</p>
                        <p class="card-text">{{ __('message.deadline') }} : {{$tickets->deadline}}</p>
                        <a href="{{route('ticket.edit' , $tickets->id)}}" class="btn btn-success">{{ __('message.updateTicket') }}</a>
                        {!! Form::open(['route' => ['ticket.destroy', $tickets->id] , 'method'=>'delete']) !!}
                            <button type="submit" class="btn btn-danger mt-2">{{ __('message.deleteTicket') }}</button>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        @empty
            <div class="alert alert-danger ">{{ __('message.noTickets') }}</div>
        @endforelse
    </div>
   

    </div>

@endsection