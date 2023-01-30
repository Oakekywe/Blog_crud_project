<x-pagelayout>

    <div class="container mt-5">
        <div class="card p-4">
            <div class="text-center mb-2">    
                <img class="rounded mb-2" height="400px" width="500px" src="{{asset("/images/posts/".$post->image)}}" alt="">
        
                <h1 class="mb-3">Post Title - {{$post->title}}</h1>        
                <p class="card-text">{{$post->content}}</p>
                @can("premimum_admin_postowner",$post->id)
                    <a class="btn btn-success" href="{{route("editPost",$post->id)}}">Update</a>
                    <a class="btn btn-danger ms-3" href="{{route("deletePost",$post->id)}}">Delete</a>
                @endcan    
            </div>

        </div>
    </div>
</x-pagelayout>