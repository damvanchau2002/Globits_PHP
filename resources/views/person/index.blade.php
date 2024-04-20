@extends('welcome')
@section('content')
    <a href="{{route('person.create')}}" class="btn btn-success">Thêm</a>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">full name</th>
            <th scope="col">gender</th>
            <th scope="col">birthdate</th>
            <th scope="col">phone_number</th>
            <th scope="col">address</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($person as $key => $con)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$con->full_name}}</td>
                <td>
                  @if ($con->gender == 1)
                  nam
                @else
                  nữ
                @endif
                  </td>
                <td>{{$con->birthdate	}}</td>
                <td>{{$con->phone_number}}</td>
                <td>{{$con->address}}</td>
           
                <td><a href="{{route('person.edit',$con->id)}}" class="btn btn-warning">EDIT</a>
                    <br><br>
               <form action="{{route('person.destroy',$con->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button onclick="return confirm('Bạn có muốn xóa không ?')" class="btn btn-danger">DELETE</button> 
            </form>
              </tr>
            @endforeach
       
    
        </tbody>
      </table>
@endsection