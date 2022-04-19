@extends('admin.app')
@section('content')
<h1 class="text-center">Change information in the Footer table</h1><br>
<div class="card-body">
    <a href="{{route('admin.footer.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.footer.update', $footer->id)}}" method="POST">
        @csrf
       @method('PUT')
        <div class="mb-3">
            <label for="address" class="label-group">Address</label>
            <input type="text" name="address" class="form-control" value="{{$footer->address}}">
        </div>
        
        <div class="mb-3">
            <label for="phone1" class="label-group">Phone1</label>
            <input type="phone" name="phone1" class="form-control" value="{{$footer->phone1}}">
        </div>

        <div class="mb-3">
            <label for="phone2" class="label-group">Phone2</label>
            <input type="phone" name="phone2" class="form-control" value="{{$footer->phone2}}">
        </div>

        <div class="mb-3">
            <label for="email1" class="label-group">Email1</label>
            <input type="email" name="email1" class="form-control" value="{{$footer->email1}}">
        </div>
        
        <div class="mb-3">
            <label for="email2" class="label-group">Email2</label>
            <input type="email" name="email2" class="form-control" value="{{$footer->email2}}">
        </div>

        <div class="mb-3">
            <label for="link" class="label-group">Link</label>
            <input type="url" name="link" class="form-control" value="{{$footer->link}}">
        </div>
        
       <button type="submit" class="btn btn-success">Save</button>

    </form>
</div>
    
@endsection