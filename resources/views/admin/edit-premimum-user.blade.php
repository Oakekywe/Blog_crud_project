<x-adminlayout>
      
  <div class="container">
      <div class="col-md-4 offset-4 mt-4">
          <form action="{{route("updateUser",$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
                  <h2 class="text-center text-info mb-4">Edit User</h2>
                  @if(session("message"))
                  <div class="alert alert-success">
                    {{session("message")}}
                  </div>
                  @endif
                  
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row mb-4">
                    
                    <div class="col">
                      <div class="form-outline">
                        <input type="text" id="form3Example2" class="form-control" name="username" value="{{$user->username}}"/>
                        <label class="form-label" for="form3Example2">Username</label>
                      </div>
                    </div>
                  </div>
                    @error("username")
                    <p class="text-danger">{{$message}} </p>
                    @enderror 

                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" id="form3Example3" class="form-control" name="email" value="{{$user->email}}"/>
                    <label class="form-label" for="form3Example3">Email</label>
                  </div>
                  @error("email")
                    <p class="text-danger">{{$message}} </p>
                    @enderror 
                
                  <div class="row mb-4">
                    <div class="col-md-6">
                        <!-- isAdmin -->
                        <label class="form-label" for="form3Example3">is Admin?</label>
                        <select name="isAdmin" id="" class="form-control">
                            <option value="1" {{$user->isAdmin=="1" ? "selected" : ""}}>TRUE</option>
                            <option value="0" {{$user->isAdmin=="0" ? "selected" : ""}}>FALSE</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <!-- isPremimum -->
                        <label class="form-label" for="form3Example3">is Premimum?</label>
                        <select name="isPremimum" id="" class="form-control">
                            <option value="1" {{$user->isPremimum=="1" ? "selected" : ""}}>TRUE</option>
                            <option value="0" {{$user->isPremimum=="0" ? "selected" : ""}}>FALSE</option>
                        </select>
                    </div>
                  </div>

                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary bg-info bg-gradient text-white btn-block mb-4">Update</button>
                  
                </form>
      </div>
  </div>
</x-pagelayout>