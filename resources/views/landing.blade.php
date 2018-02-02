@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="columns is-multiline">
        @foreach($things as $thing)
            <div class="column is-one-third">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                        <img src="{{$thing->image_url}}" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <p><strong>From {{ Carbon\Carbon::parse($thing->start_date)->toFormattedDateString() }}<br />
                            until {{ Carbon\Carbon::parse($thing->end_date)->toFormattedDateString() }}</strong></p>
                            <p>{{$thing->description}}.</p>
                            <!-- Where: {{$thing->location_url}} -->
                            <!-- <a href="#">#css</a> <a href="#">#responsive</a> -->
                            <small>Posted about
                            <time datetime="{{$thing->created_at}}">
                                {{ Carbon\Carbon::parse($thing->created_at)->diffForHumans() }}
                            </time>
                            By {{ $thing->user->name }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection


