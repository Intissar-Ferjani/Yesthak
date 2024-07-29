<ul>
    @foreach($items as $menu_item)
        <a href="{{ $menu_item->link() }}" style="text-decoration: none !important;"><i class="fa-regular fa-address-card fa-xl" style="margin-top: 33px; margin-right:35px; float: right;"></i></a>
    @endforeach
</ul>