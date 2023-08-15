<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" body="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
</head>
<body>   
        <div class="navbar-top">
            <a href="#about us">Home</a>
            <a href="#news">about us</a>
            <div class="user-dropdown">
                <button class="user-dropbtn "> 
                  <span class="material-symbols-outlined " style="font-size:45px;">account_circle</span>     
                </button>
                <div class="user-dropdown-content">
                  <a href="#">profile</a> 
                  <a href="/api/auth/logout">logout</a> 
                </div>
            </div>  
        </div>   

            <div class="content">
                <h1>New Posts</h1>
                <form action="/createPost" method="POST" >      
                    @csrf
                    <div class="post-form">
                        
                            Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<input name="title" type="text" placeholder="title" >
                            {{-- @if($errors->has('title'))
                                <span class="error error-message"> {{ $errors->first('title') }}</span>
                            @endif --}}
                            Content : &nbsp;</span>
                            <textarea name="body" placeholder="body" ></textarea>
                            {{-- @if($errors->has('body'))
                                <span class="error error-message"> {{ $errors->first('body') }}</span>
                            @endif --}}
                        <button  >Save</button>
                        @if($errors!=null)
                        <span class="error error-message"> {{ $errors->first() }}</span>
                    @endif
                    </div>
                </form>
            </div>

            <div class="content">
                <h1>All Posts</h1>
                @foreach ($posts as $post)
                <div class="all-posts ">
                        <div class="post-actions">
                            <a class="edit-link" href="/edit-post/{{$post->id}}">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <form style="float: right;" action="/delete-post/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="delete-button"><span class="material-symbols-outlined">
                                    delete</span>
                                </button>
                            </form>
                        </div>
                        <h5>{{$post['title']}} by {{$post->user->name}}</h5>
                        {{$post['body']}}
                                
                </div>      
                @endforeach

            </div>

    </div>
</body>
    
</html>