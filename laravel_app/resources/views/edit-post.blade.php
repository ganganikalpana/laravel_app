<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" body="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <h1>Edit Post</h1>
    <div>
        <form action="/edit-post/{{$post->id}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title" value={{$post->title}}>
            <textarea name="body" >{{$post->body}}</textarea>
            <button>Save Changes</button>
        </form>
    </div>
</body>
</html>