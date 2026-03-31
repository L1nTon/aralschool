@props(['title', 'text', 'list_type' => 'ul', 'banner' => null, 'step' => 1])

<article>
    <div class="title" data-step="{{ $step }}"> {{-- Теперь тут будет 1, 2, 3... --}}
        <h3>{{ $title }}</h3>
    </div>
    
    @if ($banner)
        <div class="go-to-form">
            <span>
                <p>
                    {{ $banner }}
                </p>
                <div class="line"></div>
                <div class="square"></div>
            </span>
        </div>
    @endif

    @if($list_type === 'ol')
        <ol>
            {!! $text !!}
        </ol>
    @else
        <ul>
            {!! $text !!}
        </ul>
    @endif
</article>