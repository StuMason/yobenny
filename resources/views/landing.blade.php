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
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection


