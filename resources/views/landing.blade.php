@extends('layouts.app')

@section('content')
<section class="hero is-large" id="hero-landing">
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title is-size-1 has-text-light has-text-weight-bold">
          Stop missing out on the good stuff.
      </h1>
    </div>
  </div>
</section>

<section class="section" id="landing-tiles">
    <div class="container">
        <div class="tile is-ancestor">
        <div class="columns is-multiline">
        @foreach($events as $event)
            <div class="column is-one-third">
                <a href='{{ url("events/{$event->uuid}") }}'>
                    <div class="card has-shadow">
                        <div class="card-image">
                            <figure class="image is-4by3">
                            <img src="{{$event->image_url}}" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <h2 class="title">{{$event->title}}</h2>
                                <p><strong>{{ Carbon\Carbon::parse($event->start_date)->format('D jS \\of M') }}   
                                'til {{ Carbon\Carbon::parse($event->end_date)->format('D jS \\of M') }}<br />
                                Opens {{ Carbon\Carbon::parse($event->start_time)->format('G:i') }}   
                                until {{ Carbon\Carbon::parse($event->end_time)->format('G:i') }}</strong></p>

                                <!-- <p>{{$event->description}}.</p> -->
                                <!-- <p>{{$event->where}}.</p> -->

                                <p><small> 
                                @foreach($event->categories as $category)
                                    <span class="tag has-grey-text">{{$category->name}}</span>
                                @endforeach
                                </small></p>

                                <small>Posted about
                                <time datetime="{{$event->created_at}}">
                                    {{ Carbon\Carbon::parse($event->created_at)->diffForHumans() }}
                                </time>
                                By {{ $event->user->name }}</small>
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


