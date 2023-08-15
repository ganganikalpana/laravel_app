<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body >
    <div >
        @auth
        <div class="navbar-top">
            {{-- <a href="#about us">Home</a>
            <a href="#news">about us</a> --}}
            <div class="user-dropdown">
                <button class="user-dropbtn "> 
                  <span class="material-symbols-outlined " style="font-size:45px;">account_circle</span>     
                </button>
                <div class="user-dropdown-content">
                  {{-- <a href="#">profile</a>  --}}
                  <a><form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button style="border: none;background-color: transparent;" type="submit">Logout</button>
                </form><a>
                </div>
            </div>  
            
        </div>   

            <div class="content">
                <h1>New Posts</h1>
                <form action="/createPost" method="POST" >      
                    @csrf
                    <div class="post-form">
                        
                        Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<input name="title" type="text" placeholder="title" >
                        Content : &nbsp;</span>
                        <textarea name="body" placeholder="body" ></textarea>    
                        <button>Save</button>

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
        @else
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
                <button>Login</button>
                <div>
                    <a href="/register" >signup?</a>
                </div>
            </form>
            </div>
        @endauth
</body>
    
</html>