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
    <form action="{{ route('country.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Code</label>
            <input type="text" name="code" placeholder="Thêm code ..." >
            @if ($errors->has('code'))
                <p class="text-danger">{{ $errors->first('code') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Name</label>
            <input type="text" name="name" placeholder="Thêm name ..." >
            @if ($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Description</label>
            <input type="text" name="description" placeholder="Thêm description ..." >
            @if ($errors->has('description'))
                <p class="text-danger">{{ $errors->first('description') }}</p>
            @endif
        </div>
        <button class="btn btn-primary" type="submit">Thêm</button>
    </form>
    
   
@endsection