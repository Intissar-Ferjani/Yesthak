<ul>
    @foreach($items as $menu_item)
        <a href="{{ $menu_item->link() }}" style="text-decoration: none !important;"><i class="fa-solid fa-house fa-xl" style="margin-top: 30px; margin-right:35px; float: right;"></i></a>
    @endforeach
</ul>