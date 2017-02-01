@extends('layouts.app')

@section('title', $room->author.' - '.config('app.name', 'Laravel'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="video-player">
                        <embed
                                width="100%"
                                height="100%"
                                wmode="opaque"
                                allowfullscreen="true"
                                allowscriptaccess="always"
                                src="{{ $room->live_url }}"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
