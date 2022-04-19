@extends('admin.app')
@section('content')
   <h1 class="text-center">Change the data in the slider table</h1><br>

   @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
   @endif
 
   <div class="card-body">
    <a href="{{route('admin.slider.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <form action="{{route('admin.slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
            <div class="mb-3">
                <label for="img" class="label-group">Image</label><br>
                <img src="{{asset($slider->image)}}" alt="img" width="100px" height="60px">
                <input type="file" class="form-control" name="image" value="{{$slider->image1}}">
            </div>

            <button type="submit"  class="btn btn-success">Save</button>
        </form>    
   </div>    
@endsection