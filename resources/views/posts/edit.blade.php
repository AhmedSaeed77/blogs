<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

    <title>Edit post</title>

    <style>
        .bar {
            background-color: #00ff00;
        }

        .precent {
            position: absolute;
            left: 50%;
            color: black;
        }
    </style>





    <br>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>




    <center class="fs-1">Edit Post</center>
    @if ($errors->count() > 0)
        <div id="Error" style="display:none;" class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    <form id="uploadFile" class="container" method="post" action="{{ route('post.update', $post->id) }}"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" value="{{ $post->title }}" aria-describedby="emailHelp"
                name="title" >
            {{-- @if ($errors->any())
                <div class="error" style="color:red">{{ $errors->first('title') }}</div>
            @endif --}}
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1">Auth</label>
            <input type="text" class="form-control" value="{{ $post->auth }}" aria-describedby="emailHelp"
                name="auth" placeholder="Enter auth" >
            {{-- @if ($errors->any())
                <div class="error" style="color:red">{{ $errors->first('auth') }}</div>
            @endif --}}
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Content</label>
            <textarea class="form-control" name="content" placeholder="enter your content" >{{ $post->content }}</textarea>
            {{-- @if ($errors->any())
                <div class="error" style="color:red">{{ $errors->first('content') }}</div>
            @endif --}}
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Date</label>
            <input type="date" class="form-control" value="{{ $post->date }}" name="date"
                placeholder="enter your content" >
            {{-- @if ($errors->any())
                <div class="error" style="color:red">{{ $errors->first('date') }}</div>
            @endif --}}
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Photo</label>
            <input type="file" class="form-control" value="{{ old('photo') }}" name="image">
            <img src="/images/posts/{{ $post->image }}" class="img-responsive"
                style="max-height: 100px; max-width: 100px;">
            {{-- @if ($errors->any())
                <div class="error" style="color:red">{{ $errors->first('photo') }}</div>
            @endif --}}
        </div>


        <br>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    <br>
    <a class="btn btn-dark" href="{{ route('index') }}" role="button">Back</a>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var has_error = {{ $errors->count() > 0 ? 'true' : 'false' }};
    if (has_error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            type: 'error',
            html: jQuery('#Error').html(),
            showCloseButton: true,
        });
    }
</script>

</html>
