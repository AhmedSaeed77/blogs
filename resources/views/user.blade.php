<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">

    <title>مرحبًا بالعالم!</title>
  </head>
  <body>
    <h1>مرحبًا بالعالم!</h1>
    <a href="{{ route('logoutuser') }}" class="dropdown-item"><i class="bx bx-log-out"></i> Sign Out</a>
    <form id="logout-form" action="{{ route('logoutuser') }}" method="POST" class="d-none">
        @csrf
    </form>

    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <button onclick="startFCM()" class="btn btn-danger btn-flat">Allow notification</button>
              <div class="card mt-3">
                  <div class="card-body">
                      @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                      @endif
                      <form action="{{ route('send.web-notification') }}" method="POST">
                          @csrf
                          <div class="form-group">
                              <label>Message Title</label>
                              <input type="text" class="form-control" name="title">
                          </div>
                          <div class="form-group">
                              <label>Message Body</label>
                              <textarea class="form-control" name="body"></textarea>
                          </div>
                          <button type="submit" class="btn btn-success btn-block">Send Notification</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- The core Firebase JS SDK is always required and must be listed first -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
  <script>
      var firebaseConfig = {
        apiKey: "AIzaSyBfp24R8OMMVD-VtV_tehQS4ZN29uq3xMc",
        authDomain: "laraveltest-e097d.firebaseapp.com",
        databaseURL: "https://laraveltest-e097d-default-rtdb.firebaseio.com",
        projectId: "laraveltest-e097d",
        storageBucket: "laraveltest-e097d.appspot.com",
        messagingSenderId: "32167400164",
        appId: "1:32167400164:web:e3b6a758db6887de3692f1",
        measurementId: "G-GH1NFSYHRW"
      };
      firebase.initializeApp(firebaseConfig);
      const messaging = firebase.messaging();
      function startFCM() {
          messaging
              .requestPermission()
              .then(function () {
                  return messaging.getToken()
              })
              .then(function (response) {
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                      url: '{{ route("store.token") }}',
                      type: 'POST',
                      data: {
                          token: response
                      },
                      dataType: 'JSON',
                      success: function (response) {
                          alert('Token stored.');
                      },
                      error: function (error) {
                          alert(error);
                      },
                  });
              }).catch(function (error) {
                  alert(error);
              });
      }
      messaging.onMessage(function (payload) {
          const title = payload.notification.title;
          const options = {
              body: payload.notification.body,
              icon: payload.notification.icon,
          };
          new Notification(title, options);
      });
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
	 		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
	 		crossorigin="anonymous"></script>
   
  </body>
</html>