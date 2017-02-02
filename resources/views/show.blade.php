@extends('layouts.app')

@section('title', $room->author.' - '.config('app.name', 'Laravel'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-left media-middle">
                                    <img width="100" height="100" src="{{ $room->avatar }}" alt="" class="img-circle">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h3>{{ $room->title }}</h3>
                                        <h4>{{ $room->author }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="row text-center" style="height: 100px;line-height: 100px">
                                        <div class="col-xs-6">
                                            <span>{{ $room->looker }}</span>
                                        </div>
                                        <div class="col-xs-6">
                                            <span>{{ $room->cate }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="media">
                                        <div class="media-left media-middle" style="height: 100px;">
                                            @if (auth()->check())
                                                <room-follow-button
                                                        room="{{ $room->iid }}" :default="{{ $room->followed }}">
                                                </room-follow-button>
                                            @endif
                                            <a href="{{ $room->jump_url }}" class="el-button is-plain" target="_blank">进入房间</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
