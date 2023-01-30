<x-authlayout>
  <div class="container">
      <div class="col-md-4 offset-4 mt-5 ">
          <form action="{{route("post_login")}}" method="post">
          @csrf
              <h2 class="text-center text-info">Login Form</h2>
              @if(session('error'))
              <div class="alert alert-danger">
                {{session('error')}}
              </div>
              @endif
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form2Example1" class="form-control" name="email"/>
                <label class="form-label" for="form2Example1" >Email</label>
              </div>
              @error("email")
                <p class="text-danger">{{$message}}</p>
              @enderror
            
              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control" name="password" />
                <label class="form-label" for="form2Example2" >Password</label>
              </div>         
              @error("password")
                <p class="text-danger">{{$message}}</p>
              @enderror
            
              <!-- Submit button -->
              <button type="submit" class="btn btn-primary bg-info bg-gradient text-white btn-block mb-4">Login</button>
            
              <!-- Register buttons -->
              <div class="text-center">
                <p>Not a member? <a href="{{route('register')}}">Register</a></p>
                              
              </div>
            </form>
          
      </div>
  </div>
</x-authlayout>
