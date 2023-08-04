<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div >
    <form action="/login" method="POST" class="register">
        <h1>Login</h1>
        @csrf
        <div>
            <input name="name" type="text" placeholder="name" class="form-group">
            @if($errors->has('name'))
                <span class="error error-message"> {{ $errors->first('name') }}</span>
            @endif
        </div>

        <div>
            <input name="password" type="password" placeholder="password" class="form-group">
            @if($errors->has('password'))
                <span class="error error-message"> {{ $errors->first('password') }}</span>
            @endif
            </div>
        <button  >Login</button>
        <div>
            <a href="/" >signup?</a>
        </div>
    </form>
    </div>
</body>
    
</html>