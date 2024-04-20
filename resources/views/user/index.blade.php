@extends('welcome')
@section('content')
    <a href="{{route('user.create')}}" class="btn btn-success">Thêm</a>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">email</th>
            <th scope="col">password</th>
            <th scope="col">is_active</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($user as $key => $con)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$con->email}}</td>
          
                <td>{{$con->password}}</td>

                <td>@if ($con->is_active == 0)
                    hiển thị
                @else
                    ẩn
                @endif 
                   </td>
              
           
                <td><a href="{{route('user.edit',$con->id)}}" class="btn btn-warning">EDIT</a>
                    <br><br>
               <form action="{{route('user.destroy',$con->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button onclick="return confirm('Bạn có muốn xóa người không ?')" class="btn btn-danger">DELETE</button> 
            </form>
              </tr>
            @endforeach
       
    
        </tbody>
      </table>
@endsection