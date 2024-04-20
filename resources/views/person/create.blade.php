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
    <form action="{{ route('person.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">full_name</label>
            <input type="text" name="full_name" placeholder="Thêm full_namessss ..." >
            @if ($errors->has('full_name'))
                <p class="text-danger">{{ $errors->first('full_name') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <div>
                <input type="radio" id="male" name="gender" value="1">
                <label for="male">Nam</label>
            </div>
            <div>
                <input type="radio" id="female" name="gender" value="2">
                <label for="female">Nữ</label>
            </div>
            @if ($errors->has('gender'))
                <p class="text-danger">{{ $errors->first('gender') }}</p>
            @endif
        </div>
        
        <div class="form-group">
            <label for="email">birthdate</label>
            <input type="date" name="birthdate" placeholder="Thêm birthdate ..." >
            @if ($errors->has('birthdate'))
                <p class="text-danger">{{ $errors->first('birthdate') }}</p>
            @endif
        </div>
     
        <div class="form-group">
            <label for="email">phone_number</label>
            <input type="text" name="phone_number" placeholder="Thêm phone_number ..." >
            @if ($errors->has('phone_number'))
                <p class="text-danger">{{ $errors->first('phone_number') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="email">address</label>
            <input type="text" name="address" placeholder="Thêm address ..." >
            @if ($errors->has('address'))
                <p class="text-danger">{{ $errors->first('address') }}</p>
            @endif
        </div>
        <button class="btn btn-primary" type="submit">Thêm</button>
    </form>
    <style>
        input#male {
    margin: -3px -600px;
    
}
        input#female {
    margin: -3px -600px;
    
}
    </style>
   
@endsection