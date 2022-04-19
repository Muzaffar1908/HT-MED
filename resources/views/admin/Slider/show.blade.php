@extends('admin.app')
@section('content')
    <h1 class="text-center">View data in a slider table</h1><br>
    <div class="card-body">
          <a href="{{route('admin.slider.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short">Back</i></a><br><br>    
         <table class="table">
             <tr>
                 <th>Image</th>
                 <td>
                     <img src="{{asset($slider->image)}}" alt="img" width="100px" height="60px">
                 </td>
             </tr>
         </table>
    </div>
@endsection