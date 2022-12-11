
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<title>Comment</title>
<br>

</head>
<body>

<br>
<center class="fs-1">Post</center>
<table class="table" class = "cotainer">
  <thead class="table-dark">
    <tr >
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Auth</th>
      <th scope="col">Content</th>
      <th scope="col">Date</th>
    </tr>

  </thead>
  <tbody class = "table-warning" >   
    <?php $i = 0; ?>
    
    <tr>
      <?php $i++; ?>
      <td>{{$i}}</td>
      <td>{{ $post->title }}</td>
      <td>{{ $post->auth }}</td>
      <td>{{ $post->content }}</td>
      <td>{{ $post->date }}</td>
    </tr>
    
  </tbody>
</table>
<br>
<center class="fs-1">The Comments</center>
<div class="form-group">
<table class="table" class = "cotainer">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Comment</th>
      <th scope="col">User</th>
      <th scope="col">Date</th>
      <th scope="col">Proccess</th>
    </tr>
  </thead>
  <tbody class = "table-info" >
  <?php $i = 0; ?>
  @foreach($comments as $comment) 
    <tr>
        <?php $i++; ?>
        <td>{{ $i }}</td>
        <td>  {{ $comment -> comment }}</td>
        <td> {{ $comment-> user_id}} </td>
        <td> {{ $comment -> date }} </td>
        <td>
          <a href="{{ route('post.delete_comment',$comment->id) }}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<br>
<center class="fs-1">Add Comment</center> 
<br>
<form class="container" method="get" action = "{{ route('post.add_comment',$post->id) }}" >
@csrf
<label for="exampleInputEmail1">Enter Your Comment</label>
  <div class="form-floating">
    <textarea class="form-control"  placeholder="Leave a comment here" name = "comment"  id="floatingTextarea" required></textarea>
    @if ($errors->any())
        <div class="error" style="color:red">{{ $errors->first('comment') }}</div>
    @endif
  </div>
  <br>
  <label for="exampleInputEmail1">Enter Your Date</label>
  <div class="form-floating">
    <input type="date" class="form-control" name = "date"  id="floatingTextarea" required>
    @if ($errors->any())
        <div class="error" style="color:red">{{ $errors->first('date') }}</div>
    @endif
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Add Comment</button>
</form>
<br>

<a class="btn btn-dark" href="{{ route('index') }}" role="button">Back</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>