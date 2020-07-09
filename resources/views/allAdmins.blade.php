@extends('layouts.app')

@section('content')


<div class="container">


    <div class="row">
        <div class="col-lg-4">
                @forelse($admins as $admin)
                <div class="card mt-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$admin->name}}</h5>
                        <h6 class="card-title">{{$admin->email}}</h6>
                    
                    </div>
                </div>

                @empty
                    <div class="alert-danger"> {{ __('message.noAdmin') }}</div>
                @endforelse

        <div>
    </div>
</div>
@endsection