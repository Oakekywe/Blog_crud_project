<x-adminlayout>
    <h1> Manage Premimum User</h1>
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
                <th scope="col">isAdmin</th>
                <th scope="col">isPremimum</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->isAdmin=="1" ? "TURE" : "FALSE"}}</td> {{--ternary operator --}}
                    <td>{{$user->isPremimum=="1" ? "TURE" : "FALSE"}}</td>
                    <td><a href="{{route("editUser",$user->id)}}" class="btn btn-sm btn-success">Update</a></td>
                    <td><a href="{{route("deleteUser",$user->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
                </tr>            
                
            @endforeach
                
            </tbody>
        </table>
</x-adminlayout>