@extends('admin.app')
@section('content')
    <h1 class="text-center">View information in the media table</h1><br>
    <div class="card-body">
        <a href="{{route('admin.media.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <table class="table">
            <tr>
                <th>Title_uz</th>
                <td>{{$media->title_uz}}</td>
            </tr>
            <tr>
                <th>Title_en</th>
                <td>{{$media->title_en}}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img src="{{asset($media->image)}}" alt="img" width="100px" height="60px">
                </td>
            </tr>
            <tr>
                <th>Link</th>
                <td>{{$media->link}}</td>
            </tr>
        </table>
    </div>
@endsection