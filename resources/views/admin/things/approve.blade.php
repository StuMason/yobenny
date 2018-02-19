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
                @foreach($things as $thing)
                    <tr>
                        <td>{{$thing->title}}</td>
                        <td>{{ Carbon\Carbon::parse($thing->start_date)->format('D jS \\of M') }}</td>
                        <td>{{ Carbon\Carbon::parse($thing->end_date)->format('D jS \\of M') }}</td>
                        <td>{{ Carbon\Carbon::parse($thing->created_at)->diffForHumans() }}</td>
                        <td>{{ $thing->user->name }}</td>
                        <td><a href='{{ url("things/{$thing->uuid}") }}'>View</a></td>
                        <td><a href='{{ url("admin/approve/{$thing->uuid}") }}'>Approve</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection