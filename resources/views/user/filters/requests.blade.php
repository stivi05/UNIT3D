<div class="table-responsive">
    <table class="table table-condensed table-striped table-bordered">
        <thead>
        <th class="torrents-icon">{{ __('torrent.category') }}</th>
        <th>{{ __('torrent.type') }}</th>
        <th class="torrents-filename col-sm-6">{{ __('request.request') }}</th>
        <th>{{ __('request.votes') }}</th>
        <th>{{ __('common.comments') }}</th>
        <th>{{ __('request.bounty') }}</th>
        <th>{{ __('request.age') }}</th>
        <th>{{ __('request.claimed') }} / {{ __('request.filled') }}</th>
        </thead>
        <tbody>
        @foreach ($torrentRequests as $torrentRequest)
            <tr>
                <td>
                    <div class="text-center">
                        <i class="{{ $torrentRequest->category->icon }} torrent-icon" data-toggle="tooltip"
                           data-original-title="{{ $torrentRequest->category->name }} {{ __('request.request') }}"></i>
                    </div>
                </td>
                <td>
                        <span class="label label-success">
                            {{ $torrentRequest->type->name }}
                        </span>
                </td>
                <td>
                    <a class="view-torrent" href="{{ route('request', ['id' => $torrentRequest->id]) }}">
                        {{ $torrentRequest->name }}
                    </a>
                </td>
                <td>
                        <span class="badge-user">
                            {{ $torrentRequest->votes }}
                        </span>
                </td>
                <td>
                        <span class="badge-user">
                            {{ $torrentRequest->comments->count() }}
                        </span>
                </td>
                <td>
                        <span class="badge-user">
                            {{ $torrentRequest->bounty }}
                        </span>
                </td>
                <td>
                        <span>
                            {{ $torrentRequest->created_at->diffForHumans() }}
                        </span>
                </td>
                <td>
                    @if ($torrentRequest->claimed != null && $torrentRequest->filled_hash == null)
                        <button class="btn btn-xs btn-primary">
                            <i class="{{ config('other.font-awesome') }} fa-hand-paper"></i> {{ __('request.claimed') }}
                        </button>
                    @elseif ($torrentRequest->filled_hash != null && $torrentRequest->approved_by == null)
                        <button class="btn btn-xs btn-info">
                            <i class="{{ config('other.font-awesome') }} fa-question-circle"></i> {{ __('request.pending') }}
                        </button>
                    @elseif ($torrentRequest->filled_hash == null)
                        <button class="btn btn-xs btn-danger">
                            <i class="{{ config('other.font-awesome') }} fa-times-circle"></i> {{ __('request.unfilled') }}
                        </button>
                    @else
                        <button class="btn btn-xs btn-success">
                            <i class="{{ config('other.font-awesome') }} fa-check-circle"></i> {{ __('request.filled') }}
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $torrentRequests->links() }}
    </div>
</div>
