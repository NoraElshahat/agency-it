@extends('layouts.app')

@section('content')

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">UserName</th>
     
   
    </tr>
  </thead>
  <tbody>
   
   @forelse($users as $user)
    @if($user->adminRole == 0)

        <tr>
            <td>{{$user->name}}<td>
            <td>
                <a href="{{ route('makeAdmin', $user->id) }}" class="btn btn-info">{{ __('message.makeAdmin') }}</a>
            </td>
        <tr>
    @endif
    @empty
        <div class='alert alert-danger'>no user founded</div>
    @endforelse
  </tbody>
</table>

@endsection