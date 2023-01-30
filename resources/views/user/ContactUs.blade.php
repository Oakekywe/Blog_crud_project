<x-pagelayout>
    
    <div class="container-fluid">
        <h2 class="mt-4 text-info mb-4">Contact Us</h2>
        <div class="row">
            <!-- map -->
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1909.
                7204533888373!2d96.17602760794747!3d16.804469214779918!2m3!1f0!2f0!3f0!3m2
                !1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ecc6f0fb9e17%3A0x8d8c7a1c725a4d74!2sKy
                ar%20Kwet%20Thit%20Ward%2C%20Yangon!5e0!3m2!1sen!2smm!4v1672596911696!5m2!1s
                en!2smm" width="600" height="400" style="border:0;" allowfullscreen="" 
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- contact Form -->
            <div class="col-md-6">
                @if(session("message"))
                <div class="alert alert-success">
                    {{session("message")}}
                </div>
                @endif
                <form action="{{route("sendContact")}}" method="post">                
                    @csrf
                    <h2 class="text-center text-info mb-4">Contact Us</h2>
                    <!-- name -->
                    <div class="form-outline mb-3">
                        <input type="text" id="form3Example2" class="form-control" name="username"/>
                        <label class="form-label" for="form3Example2">Username</label>
                    </div> 
                    @error("username")
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                
                    <!-- email -->
                    <div class="form-outline mb-3">
                        <input type="email" id="form3Example2" class="form-control" name="email">
                        <label class="form-label" for="form3Example2">Email</label>
                    </div>
                    @error("email")
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <!-- content -->
                    <!-- <label class="form-label mt-2" for="form3Example4">Content</label> -->
                    <textarea name="message" id="form3Example4" placeholder="Message" class="form-control mb-4" 
                    cols="10" rows="3"></textarea>   
                    @error("message")
                        <p class="text-danger">{{$message}}</p>
                    @enderror 
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary bg-info bg-gradient text-white btn-block mb-4">Send Mesaage</button>
                    
                    
                </form>

            </div>
        </div>
    </div>
</x-pagelayout>