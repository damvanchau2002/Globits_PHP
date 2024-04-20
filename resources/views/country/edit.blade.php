@extends('welcome')
@section('content')
    <a href="{{route('country.index')}}" class="btn btn-dark">danh sách</a>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-group button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <a href="{{route('country.create')}}" class="btn btn-success">Thêm</a>


        <form action="{{route('country.update',$country->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Code</label>
                <input type="text" name="code" value="{{$country->code}}" required>
            </div>
            <div class="form-group">
                <label for="email">Name</label>
                <input type="text" name="name" value="{{$country->name}}" required>
            </div>
            <div class="form-group">
                <label for="email">Description</label>
                <input type="text" name="description" value="{{$country->description}}" required>
            </div>
            <button class="btn btn-primary" type="submit">Sửa</button>
        </form>
   
@endsection