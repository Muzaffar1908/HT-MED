@extends('admin.app')
@section('content')
      <h1 class="text-center">Change information in the Category table</h1><br>
      <div class="card-body">
        <a href="{{route('admin.category.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
          <div class="table-responsive">
              <form action="{{route('admin.category.update', $category->id)}}" method="POST">
                 @csrf
                 @method('PUT')
                <div class="mb-3">
                    <label for="title_uz" class="label-group">Title_uz</label>
                    <input type="text" name="title_uz" class="form-control" value="{{$category->title_uz}}">
                </div>

                <div class="mb-3">
                    <label for="title_uz" class="label-group">Title_en</label>
                    <input type="text" name="title_en" class="form-control" value="{{$category->title_en}}">
                </div>

                <button type="submit"  class="btn btn-success">Save</button>

              </form>
          </div>
      </div>
@endsection