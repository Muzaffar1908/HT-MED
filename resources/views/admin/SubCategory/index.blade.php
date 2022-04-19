@extends('admin.app')
@section('content')

<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SubCategory title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.subcategory.store')}}" method="POST" enctype="multipart/form-data">
                 @csrf
                 <label class="label_group">Category</label>
                 <select class="form-select" name="category_id" aria-label="Default select example">

                     <option selected>Open this select categories</option>
                     @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->title_en}}</option>
                     @endforeach
            
                  </select><br>
                 <div class="mb-3">
                     <label for="title_uz" class="label_group">Title_uz</label>
                     <input type="text" name="title_uz" class="form-control" value="{{old('title_uz')}}">
                 </div>

                 <div class="mb-3">
                    <label for="title_en" class="label_group">Title_en</label>
                    <input type="text" name="title_en" class="form-control" value="{{old('title_en')}}">
                </div>

                <div class="mb-3">
                    <label for="image" class="label_group">Image</label>
                    <input type="file" name="image" class="form-control" value="{{old('image')}}">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Active</label>
                </div>

                <div class="modal-footer d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>

                </form>
            </div>
            
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-header">
       <div class="d-flex justify-content-between align-items-center">
           <h1>SubCategory</h1>
           <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i>Add</button>
       </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($subcategories as $subcategory)
                    <tbody>
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$subcategory->title_en}}</td>
                            <td>
                                <img src="{{asset($subcategory->image)}}" alt="img" width="100px" height="60px">
                            </td>
                            <td>
                                <form action="{{route('admin.status')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="model" value="SubCategory">
                                    <input type="hidden" name="id" value="{{$subcategory->id}}">
                                    @if($subcategory->status == '1')
                                        <button type="submit" class="btn btn-success btn-sm">Faol</button>
                                @else
                                    <button type="submit" class="btn btn-danger btn-sm">Faol emas</button>
                                    @endif
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.subcategory.show', $subcategory->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.subcategory.edit', $subcategory->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <form action="{{route('admin.subcategory.destroy', $subcategory->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection