@extends('layouts.app')

@section('content')


<div class="container">

{!! Form::open(['route' => 'ticket.store']) !!}

  <div class="form-group">
  
    {!! Form::text('description', null,['class'=>'form-control' , 'placeholder'=>'Enter description of Ticket']) !!}    
 
 </div>


 <div class="form-group">

        <label for="cars">Choose status</label>

        <select name="status">
            <option>Open</option>
            <option>Closed</option>
        
        </select>
</div>

<div class="form-group">

        <label for="cars">Assign TO</label>

        <select name="user_id">
            
            @forelse($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @empty
                <div> No user Found</div>
            @endforelse
        </select>
</div>


    <div class="form-group">

    {!! Form::date('deadline', null,['class'=>'form-control' , 'placeholder'=>'Enter deadline of ticket']) !!}    

    </div>
    
    {!! Form::submit('Save !' , ['class'=>'btn btn-success btn-block']) !!}


  {!! Form::close() !!}

</div>
@endsection
