@props(['menus' => []])
@foreach ( $menus as $menu)
<li>
    <a href="{{ $menu->url }}" target="{{ $menu->target }}">
        {{ $menu->title }}
    </a>
</li>
@endforeach