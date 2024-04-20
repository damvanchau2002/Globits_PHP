@extends('welcome')
@section('content')
    <a href="{{route('user.index')}}" class="btn btn-dark">danh sách</a>
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
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">email</label>
            <input type="text" name="email" placeholder="Thêm email ..." >
            @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="email">password</label>
            <input type="password" name="password" placeholder="Thêm password ..." >
            @if ($errors->has('password'))
                <p class="text-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>
     
        <div class="form-group">
            <label for="email">is_active</label>
            <select name="is_active" class="form-control input-sm m-bot15">
                <option value="0">Hiển thị</option>
                <option value="1">Ân</option>
            </select>
            @if ($errors->has('is_active'))
                <p class="text-danger">{{ $errors->first('is_active') }}</p>
            @endif
        </div>
        <button class="btn btn-primary" type="submit">Thêm</button>
    </form>
    
   
@endsection