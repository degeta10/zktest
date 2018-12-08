@extends('layouts.app')

@section('content')
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>User - ID</th>
        <th>Time</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log)
        <tr>
            <td>{{$log->pin}}</td>
            <td>{{$log->datetime}}</td>
            @if ($log->status == 0)
                <td>Check-In</td>  
            @else
                <td>Check-Out</td>
            @endif
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
    
