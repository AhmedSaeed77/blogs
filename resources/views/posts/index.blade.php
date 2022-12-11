<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />


<title>The Posts</title>




<br>
<a class="btn btn-primary" href="{{ route('post.add') }}" role="button">Add New post</a><br>

<center class="fs-1">The Posts</center>
<br><br>
</head>
<body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <table class="table" class = "cotainer">
    <thead class="table-dark">
      <tr >
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Auth</th>
        <th scope="col">Content</th>
        <th scope="col">Date</th>
        <th scope="col">Processes</th>
      </tr>
    </thead>
    <tbody class = "table-info" >
    <?php $i = 0; ?>
    @foreach($posts as $post)
      <tr>            
          <?php $i++; ?>
          <td>{{$i}}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->auth }}</td>
          <td>{{ $post->content }}</td>
          <td>{{ $post->date }}</td>
          <td>
            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-primary">Edit</a>
             <a href="{{ route('post.showcomment',$post->id) }}" class="btn btn-secondary">showComment</a>
             <a href="{{ route('post.delete',$post->id) }}" class="btn btn-danger">Delete</a>
          </td>

        </tr>
      @endforeach
    </tbody>

  </table>
</body>

</html>





