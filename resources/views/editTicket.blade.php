@extends('layouts.app')

@section('content')

<div class="container mt-4">
            <div class="row">
                    <div class="col-lg-8">
                    {{ Form::model( $oneTicket ,['route' => ['ticket.update' , $oneTicket ],'method'=>'put'])}}
                  
                        <div class="form-group text-light">
                            
                            {!! Form::text('description', null,['class'=>'form-control', 'placeholder'=>'edit description of Ticket']) !!}    
                        </div>

                        <div class="form-group">
                            <label> {{ __('message.editTicket') }}</label>
                            <select name="status">
                                <option>Open</option>
                                <option>Closed</option>
                            </select>  
                        </div>
                        <div class="form-group text-light">
                            
                            {!! Form::date('deadline', null,['class'=>'form-control', 'placeholder'=>'edit deadline of Ticket']) !!}    
                        </div>
                        
                        <button type="submit" class="btn btn-success">{{ __('message.save') }}</button>
                    </form>


                    </div>
            </div>



@endsection