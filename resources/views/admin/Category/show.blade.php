@extends('admin.app')
@section('content')
    <h1 class="text-center">View information in the Category table</h1><br>
    <div class="card-body">
        <a href="{{route('admin.category.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <table class="table">
            <tr>
                <th>Title_uz</th>
                <td>{{$category->title_uz}}</td>
            </tr>
            <tr>
                <th>Title_en</th>
                <td>{{$category->title_en}}</td>
            </tr>
        </table>
    </div>
@endsection