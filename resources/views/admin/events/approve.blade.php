@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Starts</th>
                    <th>Ends</th>
                    <th>Posted</th>
                    <th>User</th>
                    <th>View</th>
                    <th>Approve</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{$event->title}}</td>
                        <td>{{ Carbon\Carbon::parse($event->start_date)->format('D jS \\of M') }}</td>
                        <td>{{ Carbon\Carbon::parse($event->end_date)->format('D jS \\of M') }}</td>
                        <td>{{ Carbon\Carbon::parse($event->created_at)->diffForHumans() }}</td>
                        <td>{{ $event->user->name }}</td>
                        <td><a href='{{ url("events/{$event->uuid}") }}'>View</a></td>
                        <td><a href='{{ url("admin/approve/{$event->uuid}") }}'>Approve</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection