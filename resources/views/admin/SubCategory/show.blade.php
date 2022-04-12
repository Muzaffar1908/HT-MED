@extends('admin.app')
@section('content')
    <h1 class="text-center">View data in the SubCategory table</h1><br>
    <div class="card-body">
        <a href="{{route('admin.subcategory.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <table class="table">
            <tr>
                <th>Title_uz</th>
                <td>{{$subcategory->title_uz}}</td>
            </tr>
            <tr>
                <th>Title_en</th>
                <td>{{$subcategory->title_en}}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img src="{{asset($subcategory->image)}}" alt="img" width="100px" height="60px">
                </td>
            </tr>
        </table>
    </div>
@endsection