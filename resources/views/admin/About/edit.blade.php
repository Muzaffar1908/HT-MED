@extends('admin.app')
@section('content')
    <h1 class="text-center">Change information in the About table</h1><br>
    <div class="card-body">
        <form action="{{route('admin.about.update', $about->id)}}" method="POST">
                   @csrf
                   @method('PUT')
            <div class="mb-3">
                <label for="desc_uz" class="label-group">Desc_uz</label>
                <textarea name="desc_uz" id="summernote1" cols="10" rows="5">{{$about->desc_uz}}</textarea>
            </div>

            <div class="mb-3">
                <label for="desc_en" class="label-group">Desc_en</label>
                <textarea name="desc_en" id="summernote2" cols="10" rows="5">{{$about->desc_en}}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Save</button>

        </form>
    </div>
@endsection