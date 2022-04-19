@extends('admin.app')
@section('content')
<h1 class="text-center">Change data in the SubCategory table</h1><br>
   <div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <a href="{{route('admin.subcategory.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <form action="{{route('admin.subcategory.update', $subcategory->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label class="label_group">Category</label>
            <select class="form-select" name="category_id" aria-label="Default select example">

                <option selected>Open this select categories</option>
                @foreach($categories as $category)
                <option
                 @if($category->id == $subcategory->category_id)
                     selected
                 @endif
                 value="{{$category->id}}">{{$category->title_en}}</option>
                @endforeach

            </select><br>
            <div class="mb-3">
                <label for="title_uz" class="label_group">Title_uz</label>
                <input type="text" name="title_uz" class="form-control" value="{{$subcategory->title_uz}}">
            </div>

            <div class="mb-3">
                <label for="title_en" class="label_group">Title_en</label>
                <input type="text" name="title_en" class="form-control" value="{{$subcategory->title_en}}">
            </div>

            <div class="mb-3">
                <label for="image" class="label_group">Image</label><br>
                <img src="{{asset($subcategory->image)}}" alt="img" width="100px" height="60px">
                <input type="file" name="image" class="form-control" value="{{$subcategory->image}}">
            </div>

            <button type="submit" class="btn btn-success">Save</button>

        </form>
   </div>
    
@endsection