@extends('layouts.app')

@section('content')
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>User - ID</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->pin2}}</td>
            <td>{{$user->name}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
    
