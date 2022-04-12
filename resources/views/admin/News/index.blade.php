@extends('admin.app')
@section('content')

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">News title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.news.store')}}" method="POST" enctype="multipart/form-data">
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
                <div class="mb-3">
                    <label for="title_uz" class="label-group">Title_uz</label>
                    <input type="text" name="title_uz" class="form-control" value="{{old('title_uz')}}">
                </div>

                <div class="mb-3">
                    <label for="title_en" class="label-group">Title_en</label>
                    <input type="text" name="title_en" class="form-control" value="{{old('title_en')}}">
                </div>

                <div class="mb-3">
                    <label for="image" class="label-group">Image</label>
                    <input type="file" name="image" class="form-control" value="{{old('image')}}">
                </div>

                <div class="mb-3">
                    <label for="desc_uz" class="label-group">Desc_uz</label>
                    <textarea name="desc_uz" id="summernote1" cols="10" rows="5" class="form-control">{{old('desc_uz')}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="desc_en" class="label-group">Desc_en</label>
                    <textarea name="desc_en" id="summernote2" cols="10" rows="5"  class="form-control">{{old('desc_en')}}</textarea>
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
           <h1>News</h1>
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
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($news as $new)
                    <tbody>
                        <tr>
                            <td>{{($news->currentpage() - 1) * $news->perpage() + ($loop->index+1)}}</td>
                            <td>{{$new->title_en}}</td>
                            <td>
                                <img src="{{asset($new->image)}}" alt="img" width="100px" height="60px">
                            </td>
                            <td>{{$new->desc_en}}</td>
                            <td>
                                <form action="{{route('admin.status')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="model" value="News">
                                    <input type="hidden" name="id" value="{{$new->id}}">
                                    @if ($new->status == '1')
                                        <button type="submit" class="btn btn-sm btn-success">Faol</button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-danger">Faol emas</button>
                                    @endif
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.news.show', $new->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.news.edit', $new->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <form action="{{route('admin.news.destroy', $new->id)}}" method="POST" enctype="multipart/form-data">
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
            {{$news->links()}}
        </div>
    </div>
</div>

@endsection