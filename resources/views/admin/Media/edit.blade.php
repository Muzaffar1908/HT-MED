@extends('admin.app')
@section('content')
<h1 class="text-center">Change information in the media table</h1><br>
<div class="card-body">
    <a href="{{route('admin.media.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.media.update', $media->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
       <div class="mb-3">
           <label for="title_uz" class="label-group">Title_uz</label>
           <input type="text" name="title_uz" class="form-control" value="{{$media->title_uz}}">
       </div>

       <div class="mb-3">
         <label for="title_en" class="label-group">Title_en</label>
         <input type="text" name="title_en" class="form-control" value="{{$media->title_en}}">
       </div>

       <div class="mb-3">
         <label for="image" class="label-group">Image</label><br>
         <img src="{{asset($media->image)}}" alt="img" width="100px" height="60px">
         <input type="file" name="image" class="form-control" value="{{$media->image}}">
       </div>

       <div class="mb-3">
         <label for="link" class="label-group">Link</label>
         <input type="url" name="link" class="form-control" value="{{$media->link}}">
       </div>

        <button type="submit" class="btn btn-success">Save</button>

     </form>
</div>
@endsection