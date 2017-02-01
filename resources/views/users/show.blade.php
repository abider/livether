@extends('layouts.app')

@section('title', $user->name)

@section('content')
    <user-page :id="{{ $user->id }}"></user-page>
@endsection
