@extends('layout.default')

@section('breadcrumb')
    <li>
        <a href="{{ route('staff.dashboard.index') }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">{{ __('staff.staff-dashboard') }}</span>
        </a>
    </li>
    <li>
        <a href="{{ route('staff.types.index') }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">{{ __('staff.torrent-types') }}</span>
        </a>
    </li>
    <li class="active">
        <a href="{{ route('staff.types.edit', ['id' => $type->id]) }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">
                {{ __('common.edit') }}
                {{ __('torrent.torrent') }}
                {{ __('common.type') }}
            </span>
        </a>
    </li>
@endsection

@section('content')
    <div class="container box">
        <h2>
            {{ __('common.edit') }}
            {{ __(trans_choice('common.a-an-art',false)) }}
            {{ __('torrent.torrent') }}
            {{ __('common.type') }}
        </h2>
        <form role="form" method="POST" action="{{ route('staff.types.update', ['id' => $type->id]) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">{{ __('common.name') }}</label>
                <label>
                    <input type="text" class="form-control" name="name" value="{{ $type->name }}">
                </label>
            </div>

            <div class="form-group">
                <label for="name">{{ __('common.position') }}</label>
                <label>
                    <input type="text" class="form-control" name="position" value="{{ $type->position }}">
                </label>
            </div>

            <button type="submit" class="btn btn-default">{{ __('common.submit') }}</button>
        </form>
    </div>
@endsection
