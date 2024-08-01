@extends('clients.layouts.master')

@section('title', 'Home')

@section('content')

    @include('clients.home.banner')

    @include('clients.home.post-new')

    @include('clients.home.content')
@endsection
