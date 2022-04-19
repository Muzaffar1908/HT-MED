@extends('admin.app')
@section('content')
    <h1 class="text-center">View information in the Servise table</h1><br>
     <div class="card-body">
         <a href="{{route('admin.servise.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
         <table class="table">
                <tr>
                    <th>Text_uz</th>
                    <td>{{$servise->text_uz}}</td>
                </tr>
                <tr>
                    <th>Text_en</th>
                    <td>{{$servise->text_en}}</td>
                </tr>
         </table>
     </div>
@endsection