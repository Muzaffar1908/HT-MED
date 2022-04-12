@extends('admin.app')
@section('content')
    <h1 class="text-center">View information in the Footer table</h1><br>
    <div class="card-body">
        <a href="{{route('admin.footer.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <table class="table">
            <tr>
                <th>Address</th>
                <td>{{$footer->address}}</td>
            </tr>
            <tr>
                <th>Phone1</th>
                <td>{{$footer->phone1}}</td>
            </tr>
            <tr>
                <th>Phone2</th>
                <td>{{$footer->phone2}}</td>
            </tr>
            <tr>
                <th>Email1</th>
                <td>{{$footer->email1}}</td>
            </tr>
            <tr>
                <th>Email2</th>
                <td>{{$footer->email2}}</td>
            </tr>
            <tr>
                <th>Link</th>
                <td>{{$footer->link}}</td>
            </tr>
        </table>
    </div>
@endsection