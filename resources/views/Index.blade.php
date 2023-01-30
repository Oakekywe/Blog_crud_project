<x-pagelayout>

    {{-- {{session("message")}} --}}
        @if(session('error'))
            <div class="alert alert-danger">
                {{session("error")}}
            </div>
        @endif 
    <header></header>
    <div class="container">
        <h2 class="text-info mt-4">All Posts</h2>
        @if(session('message'))
            <div class="alert alert-success">
                {{session("message")}}
            </div>
        @endif    
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="card mt-4">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img class="card-img-top" alt="Fissure in Sandstone" src="{{asset("images/posts/".$post->image)}}"/>
                            {{-- <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a> --}}
                            </div>
                            <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p>(Posted by {{$post->user->username}} )</p>
                            <a href="{{route("showPostById",$post->id)}}" class="btn btn-primary">See More</a>
                            </div>
                        </div>       
                    </div>                    
                @endforeach
                {{$posts->links()}}
            </div>
        </div>
</x-pagelayout>