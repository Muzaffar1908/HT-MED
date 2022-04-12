@extends('admin.app')
@section('content')

<!-- Button trigger modal -->

  
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Servise title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('admin.servise.store')}}" method="POST">
                      @csrf
                    <div class="mb-3">
                        <label for="text_uz" class="label-group">Text_uz</label>
                        <input type="text" name="text_uz" class="form-control" value="{{old('text_uz')}}">    
                    </div>

                    <div class="mb-3">
                        <label for="text_en" class="label-group">Text_en</label>
                        <input type="text" name="text_en" class="form-control" value="{{old('text_en')}}">    
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
            <h1>Servise</h1>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="bi bi-plus"></i>Add</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Text</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($servises as $servise)
                    <tbody>
                        <tr>
                            <td>{{ ($servises->currentpage() - 1) * $servises->perpage() + ($loop->index+1) }}</td>
                            <td>{{$servise->text_en}}</td>
                            <td>
                                <form action="{{route('admin.status')}}" method="POST">
                                    @csrf 
                                    <input type="hidden" name="model" value="Servise">
                                    <input type="hidden" name="id"  value="{{$servise->id}}">
                                    @if($servise->status == true)
                                        <button type="submit" class="btn btn-success">Faol</button>
                                    @else
                                      <button type="submit" class="btn btn-danger">Faol emas</button>
                                    @endif
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.servise.show', $servise->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.servise.edit', $servise->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <form action="{{route('admin.servise.destroy', $servise->id)}}" method="POST">
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
            {{$servises->links()}}

        </div>
    </div>
</div>

@endsection