@extends('admin.app')
@section('content')

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">About title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.about.store')}}" method="POST">
                   @csrf
                    <div class="mb-3">
                        <label for="desc_uz" class="label-group">Desc_uz</label>
                        <textarea name="desc_uz" id="summernote1" cols="10" rows="5">{{old('desc_uz')}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="desc_en" class="label-group">Desc_en</label>
                        <textarea name="desc_en" id="summernote2" cols="10" rows="5">{{old('desc_en')}}</textarea>
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
           <h1>About</h1>
           {{-- <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i>Add</button> --}}
       </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
               @foreach($abouts as $about)
                   <tbody>
                       <tr>
                           <td>{{$loop->index+1}}</td>
                           <td>{{Str::limit($about->desc_en, 50)}}</td>
                           <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('admin.about.show', $about->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                <a href="{{route('admin.about.edit', $about->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
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