<x-authlayout>
    <div class="container">
        <div class="col-md-4 offset-4 mt-5">
            <form action="{{route("post_register")}}" method="post" enctype="multipart/form-data">
              @csrf
                <h2 class="text-center text-info mb-4">Register Form</h2>
                <!-- username input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3" name="username" class="form-control" value="{{old("username")}}"/>
                  <label class="form-label" for="form3Example3">Username</label>
                </div>
                      @error("username")
                        <p class="text-danger">{{$message}} </p>
                      @enderror
              
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3" name="email" class="form-control" value="{{old("email")}}"/>
                  <label class="form-label" for="form3Example3">Email</label>
                </div>
                      @error("email")
                        <p class="text-danger">{{$message}} </p>
                      @enderror
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4" name="password" class="form-control" />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>
                      @error("password")
                        <p class="text-danger">{{$message}} </p>
                      @enderror
                <!-- Confirmation Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4" name="password_confirmation" class="form-control" />
                  <label class="form-label" for="form3Example4">Confirm Password</label>
                </div>

                <!-- image -->
                <label class="form-label" for="form3Example4">Profile Picture</label>
                <div class="form-outline mb-4">
                    <input type="file" id="form3Example4" class="form-control" name="image" />
                </div>
                      @error("image")
                        <p class="text-danger">{{$message}} </p>
                      @enderror
              
                          
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary bg-info bg-gradient text-white btn-block mb-4">Register</button>
                
                <div class="text-center">
                    <a href="{{route('login')}}">Already Registered?</a>                                 
                </div>
              </form>
        </div>
    </div>
</x-authlayout>