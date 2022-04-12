@extends('admin.app')
@section('content')

<div class="card">
    <div class="card-header">
      <h1> Connection</h1>
    </div>
    <div class="card-body">
       <div class="table-responsive">
           <table class="table">
               <thead>
                   <tr>
                       <th>№</th>
                       <th>Name</th>
                       <th>Phone</th>
                       <th>Email</th>
                       <th>Message</th>
                       <th>Action</th>
                   </tr>
               </thead>
               @foreach($connections as $connection)
                   <tbody>
                       <tr>
                           <td>{{$loop->index+1}}</td>
                           <td>{{$connection->name}}</td>
                           <td>{{$connection->phone}}</td>
                           <td>{{$connection->email}}</td>
                           <td>{{$connection->message}}</td>
                           <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('admin.connection.show', $connection->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                <form action="{{route('admin.connection.destroy', $connection->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                           </td>
                       </tr>
                   </tbody>
               @endforeach
           </table>
           {{$connections->links()}}
       </div>
    </div>
</div>

@endsection
