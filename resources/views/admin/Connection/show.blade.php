@extends('admin.app')
@section('content')
    <h1 class="text-center">View data in the Connection table</h1><br>
    <div class="card-body">
        <a href="{{route('admin.connection.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <table class="table">
            <tr>
                <th>Name</th>
                <td>{{$connection->name}}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{$connection->phone}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$connection->email}}</td>
            </tr>
            <tr>
                <th>Message</th>
                <td>{{$connection->message}}</td>
            </tr>
        </table>
    </div>
@endsection