@extends('admin.app')
@section('content')

<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Media title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="{{route('admin.media.store')}}" method="POST" enctype="multipart/form-data">
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
                    <label for="link" class="label-group">Link</label>
                    <input type="url" name="link" class="form-control" value="{{old('link')}}">
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


<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Media</h1>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="bi bi-plus"></i>Add</button>
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
                       <th>Link</th>
                       <th>Action</th>
                   </tr>
               </thead>
               @foreach($medias as $media)
                   <tbody>
                       <tr>
                           <td>{{ ($medias->currentpage() - 1) * $medias->perpage() + ($loop->index+1) }}</td>
                           <td>{{$media->title_en}}</td>
                           <td>
                               <img src="{{asset($media->image)}}" alt="img" width="100px" width="60px">
                           </td>
                           <td>{{$media->link}}</td>
                           <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.media.show', $media->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.media.edit', $media->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <form action="{{route('admin.media.destroy', $media->id)}}" method="POST" enctype="multipart/form-data">
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
           {{$medias->links()}}
       </div>
    </div>
</div>

@endsection