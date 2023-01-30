<x-pagelayout>
    
    <div class="container">
        <div class="col-md-4 offset-4 mt-4">
            <form action="{{route('post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <h2 class="text-center text-info mb-4">Create Post</h2>
                <!-- title -->
                <label class="form-label" for="form3Example2">Title</label>
                <div class="form-outline">
                    <input type="text" id="form3Example2" class="form-control" name="title"/>
                </div>  
                @error("title")
                    <p class="text-danger">{{$message}} </p>
                @enderror           
                
                <!-- image -->
                <label class="form-label mt-4" for="form3Example4">Photo</label>
                <div class="form-outline mb-4">
                    <input type="file" id="form3Example4" class="form-control" name="image"/>
                </div>
                @error("image")
                    <p class="text-danger">{{$message}} </p>
                @enderror
                <!-- content -->
                <label class="form-label" for="form3Example4">Content</label>
                <textarea name="content" id="form3Example4" class="form-control mb-4" cols="30" rows="10"></textarea>  
                @error("content")
                    <p class="text-danger">{{$message}} </p>
                @enderror 
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary bg-info bg-gradient text-white btn-block mb-4">Post</button>
                
                
            </form>
        </div>
    </div>
</x-pagelayout>