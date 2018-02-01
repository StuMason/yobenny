@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="columns">
        @foreach($things as $thing)
            <div class="column is-one-quarter">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                        <img src="{{$thing->image_url}}" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                        <div class="media-left">
                            <!-- <figure class="image is-48x48">
                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                            </figure> -->
                        </div>
                        <div class="media-content">
                            <p class="title is-4">{{ $thing->user->name }}</p>
                            <p class="subtitle is-6">From {{$thing->start_date}} until {{$thing->end_date}}</p>
                            {{-- <p class="subtitle is-6">From {{$thing->start_date->toFormattedDateString()}} until {{$thing->end_date->toFormattedDateString()}}</p> --}}
                        </div>
                        </div>
                    
                        <div class="content">
                        {{$thing->description}}.<br />
                        Where: {{$thing->location_url}}
                        <!-- <a href="#">#css</a> <a href="#">#responsive</a> -->
                        <br>
                        <time datetime="{{$thing->created_at}}">{{$thing->created_at}}</time>
                        {{-- <time datetime="2016-1-1">{{$thing->created_at->toDayDateTimeString()}}</time> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection


