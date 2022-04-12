@extends('admin.app')
@section('content')
    <h1 class="text-center">Change information in the Servise table</h1><br>
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
        <a href="{{route('admin.servise.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <form action="{{route('admin.servise.update', $servise->id)}}" method="POST">
            @csrf
            @method('PUT')
          <div class="mb-3">
              <label for="text_uz" class="label-group">Text_uz</label>
              <input type="text" name="text_uz" class="form-control" value="{{$servise->text_uz}}">    
          </div>

          <div class="mb-3">
              <label for="text_en" class="label-group">Text_en</label>
              <input type="text" name="text_en" class="form-control" value="{{$servise->text_en}}">    
          </div>           
          
          <button type="submit" class="btn btn-success">Save</button>

        </form>
    </div>
@endsection