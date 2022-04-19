@extends('admin.app')
@section('content')
    <h1 class="text-center">View information in the About table</h1><br>
    <div class="card-body">
        <a href="{{route('admin.about.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <table class="table">
            <tr>
                <th>Description_uz</th>
                <td>{{$about->desc_uz}}</td>
            </tr>
            <tr>
                <th>Description_en</th>
                <td>{{$about->desc_en}}</td>
            </tr>
        </table>
    </div>
@endsection