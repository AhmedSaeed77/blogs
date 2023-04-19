<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

@livewireStyles
<title>Livewire</title>




<br>


<center class="fs-1">Livewire</center>
<br><br>
</head>
<body>
  @livewire('counter')
  <br>
  <div class="container">
    <input type="text" name="comment"  wire:model="newComment">
    <button wire:click="addComment" >Add Comment</button>
    <br>
   
    @foreach($posts as $post)
      <input type="text" value="{{$post->title}}" readonly><br>
    @endforeach
  </div>
  @livewireScripts
</body>

</html>





