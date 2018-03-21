@extends('layouts.app')

@section('content')
<section class="hero is-large" id="hero-landing">
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title is-size-1 has-text-light has-text-weight-bold">
      Don't miss out on the good stuff.
      </h1>
    </div>
  </div>
</section>

<section class="section" id="landing-tiles">
    <div class="container">
        <div class="tile is-ancestor">
        <div class="columns is-multiline">
        @foreach($things as $thing)
            <div class="column is-one-third">
                <a href='{{ url("things/{$thing->uuid}") }}'>
                    <div class="card has-shadow">
                        <div class="card-image">
                            <figure class="image is-4by3">
                            <img src="{{$thing->image_url}}" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <h2 class="title">{{$thing->title}}</h2>
                                <p><strong>{{ Carbon\Carbon::parse($thing->start_date)->format('D jS \\of M') }}   
                                'til {{ Carbon\Carbon::parse($thing->end_date)->format('D jS \\of M') }}<br />
                                Opens {{ Carbon\Carbon::parse($thing->start_time)->format('G:i') }}   
                                until {{ Carbon\Carbon::parse($thing->end_time)->format('G:i') }}</strong></p>

                                <!-- <p>{{$thing->description}}.</p> -->
                                <!-- <p>{{$thing->where}}.</p> -->

                                <p><small> 
                                @foreach($thing->categories as $category)
                                    <span class="tag has-grey-text">{{$category->name}}</span>
                                @endforeach
                                </small></p>

                                <small>Posted about
                                <time datetime="{{$thing->created_at}}">
                                    {{ Carbon\Carbon::parse($thing->created_at)->diffForHumans() }}
                                </time>
                                By {{ $thing->user->name }}</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection


