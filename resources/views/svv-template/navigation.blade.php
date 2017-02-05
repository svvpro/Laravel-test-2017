<div class="row">
    <h2>Menus block</h2>
    @if($menus)
        <ul>
            @foreach($menus as $menu)
                <li><a href="{{ $menu->url }}">{{ $menu->name }}</a></li>
            @endforeach
        </ul>
    @endif
</div>