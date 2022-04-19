@extends('admin.app')
@section('content')

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Footer   title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.footer.store')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="address" class="label-group">Address</label>
                        <input type="text" name="address" class="form-control" value="{{old('address')}}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone1" class="label-group">Phone1</label>
                        <input type="phone" name="phone1" class="form-control" value="{{old('phone1')}}">
                    </div>

                    <div class="mb-3">
                        <label for="phone2" class="label-group">Phone2</label>
                        <input type="phone" name="phone2" class="form-control" value="{{old('phone2')}}">
                    </div>

                    <div class="mb-3">
                        <label for="email1" class="label-group">Email1</label>
                        <input type="email" name="email1" class="form-control" value="{{old('email1')}}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="email2" class="label-group">Email2</label>
                        <input type="email" name="email2" class="form-control" value="{{old('email2')}}">
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
            <h1>Footer</h1>
            {{-- <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i>Add</button> --}}
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Address</th>
                        <th>Phone1</th>
                        <th>Phone2</th>
                        <th>Email1</th>
                        <th>Email2</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($footers as $footer)
                    <tbody>
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$footer->address}}</td>
                            <td>{{$footer->phone1}}</td>
                            <td>{{$footer->phone2}}</td>
                            <td>{{$footer->email1}}</td>
                            <td>{{$footer->email2}}</td>
                            <td>{{$footer->link}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.footer.show', $footer->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.footer.edit', $footer->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    {{-- <form action="{{route('admin.footer.destroy', $footer->id)}}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <button  type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    </form> --}}
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