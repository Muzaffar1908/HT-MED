@extends('admin.app')
@section('content')
    <h1 class="text-center">View information in the News table</h1><br>
    <div class="card-body">
        <a href="{{route('admin.news.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <table class="table">
            <tr>
                <th>Title_uz</th>
                <td>{{$new->title_uz}}</td>
            </tr>
            <tr>
                <th>Title_en</th>
                <td>{{$new->title_en}}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img src="{{asset($new->image)}}" alt="img" width="100px" height="60px">
                </td>
            </tr>
            <tr>
                <th>Desc_uz</th>
                <td>{{$new->desc_uz}}</td>
            </tr>
            <tr>
                <th>Desc_en</th>
                <td>{{$new->desc_en}}</td>
            </tr>
        </table>
    </div>
@endsection