@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <img src="{{$event->image_url}}" alt="Placeholder image">
        <div class="content">
            <h2 class="title">{{$event->title}}</h2>
            <p><strong>{{ Carbon\Carbon::parse($event->start_date)->format('D jS \\of M') }}   
            'til {{ Carbon\Carbon::parse($event->end_date)->format('D jS \\of M') }}<br />
            Opens {{ Carbon\Carbon::parse($event->start_time)->format('G:i') }}   
            until {{ Carbon\Carbon::parse($event->end_time)->format('G:i') }}</strong></p>

            <p>{{$event->description}}.</p>
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

            @role('admin')
                @if(!$event->approved_by)
                    <p><a href='{{ url("admin/approve/{$event->uuid}") }}'>Approve</a></p>
                @endif
            @endrole

        </div>
    </div>
</section>
@endsection
