@extends('layouts.app')

@section('content')


<div class="container">

    {!! Form::open(['route' => 'admin.store']) !!}
  

    <div class="form-group">
    
        {!! Form::text('name', null,['class'=>'form-control' , 'placeholder'=>'Enter name of admin']) !!}    
    
    </div>

    <div class="form-group">
    
    {!! Form::text('email', null,['class'=>'form-control' , 'placeholder'=>'Enter email of admin']) !!}    

    </div>


    <div class="form-group">

    {!! Form::text('password', null,['class'=>'form-control' , 'placeholder'=>'Enter password of admin']) !!}    

    </div>

    <div class="form-group">

    {!! Form::text('adminRole', null,['class'=>'form-control' , 'placeholder'=>'Enter Admin Role of admin']) !!}    

    </div>
    
    {!! Form::submit('Save !' , ['class'=>'btn btn-success btn-block']) !!}


  {!! Form::close() !!}

</div>
@endsection
