<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Project</title>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
  rel="stylesheet"
/>
<link rel="stylesheet" href="{{asset("../css/style.css")}}">
{{-- toastr noti --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
</head>
<body>
    <!-- Navbar -->
    <x-navbar/>
<!-- Navbar -->
<div class="container">
    <div class="row">

        <div class="col-md-4 mt-4">
            <ul class="list-group list-group-light ">
                <li class="list-group-item"><a href="{{route('admin.manage_premimum_user')}}">Manage Premimum User</a></li>
                <li class="list-group-item"><a href="{{route('admin.contact_message')}}">Contact Message</a></li>
              </ul>
        </div>
        <div class="col-md-8 mt-3">
            {{$slot}}
            
        </div>
    </div>
</div>

  {{-- toastr noti --}} 
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
<script>
@if (session("message"))
  let message = "{{session("message")}}"
  toastr.danger(message);
@endif
</script>
</body>
</html>