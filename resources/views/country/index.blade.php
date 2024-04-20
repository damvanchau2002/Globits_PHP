@extends('welcome')
@section('content')
    <a href="{{route('country.create')}}" class="btn btn-success">Thêm</a>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($country as $key => $con)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$con->code}}</td>
                <td>{{$con->name}}</td>
                <td>{{$con->description}}</td>
                <td><a href="{{route('country.edit',$con->id)}}" class="btn btn-warning">EDIT</a>
                    <br><br>
               <form action="{{route('country.destroy',$con->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button onclick="return confirm('Bạn có muốn xóa không ?')" class="btn btn-danger">DELETE</button>

            </form>
             
                
              </tr>
            @endforeach
       
    
        </tbody>
      </table>
@endsection