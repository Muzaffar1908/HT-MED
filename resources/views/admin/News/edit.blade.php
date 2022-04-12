@extends('admin.app')
@section('content')
    <h1 class="text-center">Change information in the News table</h1><br>
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{route('admin.news.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
            <form action="{{route('admin.news.update', $new->id)}}" method="POST" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title_uz" class="label-group">Title_uz</label>
                    <input type="text" name="title_uz" class="form-control" value="{{$new->title_uz}}">
                </div>
    
                <div class="mb-3">
                    <label for="title_en" class="label-group">Title_en</label>
                    <input type="text" name="title_en" class="form-control" value="{{$new->title_en}}">
                </div>
    
                <div class="mb-3">
                    <label for="image" class="label-group">Image</label><br>
                    <img src="{{asset($new->image)}}" alt="img" width="100px" height="60px">
                    <input type="file" name="image" class="form-control" value="{{$new->image}}">
                </div>
    
                <div class="mb-3">
                    <label for="desc_uz" class="label-group">Desc_uz</label>
                    <textarea name="desc_uz" id="summernote1" cols="10" rows="5" class="form-control">{{$new->desc_uz}}</textarea>
                </div>
    
                <div class="mb-3">
                    <label for="desc_en" class="label-group">Desc_en</label>
                    <textarea name="desc_en" id="summernote2" cols="10" rows="5"  class="form-control">{{$new->desc_en}}</textarea>
                </div>
    
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection