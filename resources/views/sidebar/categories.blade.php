<div class="sidebar-item">
    <div class="sidebar-item__title">Категории</div>
    <div class="sidebar-item__content">
        <ul class="sidebar-category">
            @foreach($categories as $category)
                <li class="sidebar-category__item">
                    <a href="{{ route('game.category', ['id' => $category->id]) }}" class="sidebar-category__item__link{{ $id == $category->id ? ' active' : '' }}">{{ $category->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
