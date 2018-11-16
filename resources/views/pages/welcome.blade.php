@extends('main')

@section('content')
        <div class="row">
            <div class="col-md-12">
            <div class="jumbotron">
            <h1 class="display-4">Hello, Sneakerheads!</h1>
            <p class="lead">Thanks you so much for visiting, my sneakerblog</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>
            </div>
        </div><!-- end of header .row -->

        <div class="row">
            <div class="col-md-8">

                @foreach($posts as $post)

                    <div class="post">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>

                    <hr>

                @endforeach

            </div>
        
            <div class="col-md-3 col-md-offset-1">
                <h2>Sidebar</h2>
            </div>
        </div>
@endsection