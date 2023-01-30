<x-adminlayout>
  <h1> Contact Message</h1>
  @if (session("message"))
      <div class="alert alert-danger">
          {{session("message")}}
      </div>
  @endif
    <table class="table table-hover">
  <thead class="bg-info text-white">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Message</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($messages as $message)
      <tr>
        <th scope="row">{{$message->id}}</th>
        <td>{{$message->username}}</td>
        <td>{{$message->email}}</td>
        <td>{{$message->message}}</td>
        <td><a href="{{route("deleteContactMessage",$message->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
      </tr>        
    @endforeach
    
  </tbody>
    </table>
</x-adminlayout>