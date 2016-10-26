<li class="list-group-item disabled">
    <div class="user_name">{{ $article->user->name }}</div>
    <div class="user_name created_at">
        @if (Carbon::now()->diffInMinutes($article->created_at) < 1)
            {{ trans('messages.now') }}
        @elseif (Carbon::now()->diffInMinutes($article->created_at) < 60)
            {{ Carbon::now()->diffInMinutes($article->created_at).trans('messages.minutes')}}
            @elseif (Carbon::now()->diffInHours($article->created_at) < 24)
                {{ Carbon::now()->diffInHours($article->created_at).trans('messages.hours')}}
            @else
                {{ $article->created_at }}
        @endif
    </div>
</li>
<li class="list-group-item content">
    {{ $article->content }}
</li>