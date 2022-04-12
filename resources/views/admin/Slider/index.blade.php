@extends('admin.app')
@section('content')

<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Slider image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="img" class="label-group">Image</label>
                    <input type="file" class="form-control" name="image" value="{{old('image')}}">
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
              <h1>Slider</h1>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus">Add</i></button>
          </div>
    </div>
    <div class="card-body">
         <div class="table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th>№</th>
                          <th>Image</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  @foreach($sliders as $slider)
                     <tbody>
                          <tr>
                              <td>{{($sliders->currentpage() - 1) * $sliders->perpage() + ($loop->index+1)}}</td>
                              <td>
                                  <img src="{{asset($slider->image)}}" alt="img" width="100px" height="60px">
                              </td>
                              <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('admin.slider.show', $slider->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                        <a href="{{route('admin.slider.edit', $slider->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                        <form action="{{route('admin.slider.destroy', $slider->id)}}" method="POST" enctype="multipart/form-data">
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
              {{$sliders->links()}}
         </div>
    </div>
</div>

@endsection