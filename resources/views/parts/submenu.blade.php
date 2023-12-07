<!-- parts/submenu.blade.php -->
@if ($subcategories->isNotEmpty())
    <ul class="submenu dropdown-menu">
        @foreach ($subcategories as $subcategory)
            <li>
                <a class="dropdown-item" href="{{ route('category.index', $subcategory->id) }}">
                    @if ($subcategory->subcategories->isNotEmpty())
                        {{ $subcategory->name }} &raquo;
                    @else
                        {{ $subcategory->name }}
                    @endif
                </a>
                @include('parts.submenu', ['subcategories' => $subcategory->subcategories])
            </li>
        @endforeach
    </ul>
@endif
