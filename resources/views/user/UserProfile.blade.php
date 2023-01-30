<x-pagelayout>
      
  <div class="container">
      <div class="col-md-4 offset-4 mt-4">
          <form action="{{route("post_userProfile")}}" method="post" enctype="multipart/form-data">
            @csrf
                  <h2 class="text-center text-info mb-4">User Profile</h2>
                  @if(session("success"))
                  <div class="alert alert-success">
                    {{session("success")}}
                  </div>
                  @endif
                  @if(session("error"))
                  <div class="alert alert-danger">
                    {{session("error")}}
                  </div>
                  @endif
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row mb-4">
                    
                    <div class="col">
                      <div class="form-outline">
                        <input type="text" id="form3Example2" class="form-control" name="username" value="{{auth()->user()->username}}"/>
                        <label class="form-label" for="form3Example2">Username</label>
                      </div>
                    </div>
                  </div>
                
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" id="form3Example3" class="form-control" name="email" value="{{auth()->user()->email}}"/>
                    <label class="form-label" for="form3Example3">Email</label>
                  </div>
                

                  <!-- image -->
                  
                      <label class="form-label" for="form3Example4">Profile Picture</label>
                      <div class="form-outline mb-4">
                          <input type="file" id="form3Example4" name="image" class="form-control" />
                      </div>
                    
                        <img class="rounded-circle mb-4" height="200px" width="200px" src="{{asset("images/profiles/".auth()->user()->image)}}" alt="">
                    
                  
                
                  <!-- Old Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" id="form3Example4" class="form-control" name="old_password"/>
                    <label class="form-label" for="form3Example4">Old Password</label>
                  </div>
                            
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" id="form3Example4" class="form-control" name="new_password"/>
                    <label class="form-label" for="form3Example4">New Password</label>
                  </div>

                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary bg-info bg-gradient text-white btn-block mb-4">Update</button>
                  
                </form>
      </div>
  </div>
</x-pagelayout>