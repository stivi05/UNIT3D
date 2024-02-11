@extends('layout.default')

@section('page', 'page__home')

@section('main')
    @include('blocks.news')
    @if (! auth()->user()->chat_hidden)
        <div id="chat"></div>
        <script src="{{ mix('js/chat-vue3.js') }}" crossorigin="anonymous"></script>
    @endif
    @include('blocks.featured')
    @livewire('random-media')
    @include('blocks.poll')
    @include('blocks.top_torrents')
    @include('blocks.top_uploaders')
    @include('blocks.latest_topics')
    @include('blocks.latest_posts')
    @include('blocks.online')
@endsection
