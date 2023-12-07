{{-- <li class="nav-item dropdown" id="myDropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">  Treeview menu  </a>
    <ul class="dropdown-menu">
      <li> <a class="dropdown-item" href="#"> Dropdown item 1 </a></li>
      <li> <a class="dropdown-item" href="#"> Dropdown item 2 &raquo; </a>
        <ul class="submenu dropdown-menu">
          <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
          <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
          <li>
            <a class="dropdown-item" href="#">Submenu item 3 &raquo; </a>
            <ul class="submenu dropdown-menu">
              <li><a class="dropdown-item" href="#">Multi level 1</a></li>
              <li>
                <a class="dropdown-item" href="#">Multi level 2 &raquo;</a>
                <ul class="submenu dropdown-menu">
                  <li><a class="dropdown-item" href="#">Multi level 2.1</a></li>
                  <li><a class="dropdown-item" href="#">Multi level 2.2</a></li>
                  <li><a class="dropdown-item" href="#">Multi level 2.3</a></li>
                  <li>
                    <a class="dropdown-item" href="#">Multi level 2.4 &raquo;</a>
                    <ul class="submenu dropdown-menu">
                      <li><a class="dropdown-item" href="#">Multi level 3.1</a></li>
                      <li><a class="dropdown-item" href="#">Multi level 3.2</a></li>
                      <li><a class="dropdown-item" href="#">Multi level 3.3</a></li>
                      <li><a class="dropdown-item" href="{{ route('category.index') }}">Category</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="#">Multi level 3</a></li>
            </ul>
          </li>
          <li><a class="dropdown-item" href="#">Submenu item 4</a></li>
          <li><a class="dropdown-item" href="#">Submenu item 5</a></li>
        </ul>
      </li>
      <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
      <li><a class="dropdown-item" href="#"> Dropdown item 4 </a></li>
    </ul>
</li> --}}
<li class="nav-item dropdown" id="myDropdown">
  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">  Treeview menu  </a>
  <ul class="dropdown-menu">
      @foreach ($categories as $category)
          <li>
            @if ($category->parent_id == 0 )
                <a class="dropdown-item" href="#">
                    {{ $category->name }}
                    @if ($category->subcategories->count() > 0)
                        &raquo;
                    @endif
                </a>
                @if ($category->subcategories->count() > 0)
                    @include('parts.submenu', ['subcategories' => $category->subcategories])
                @endif
              @endif
          </li>
      @endforeach
  </ul>
</li>