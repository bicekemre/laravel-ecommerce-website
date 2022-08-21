<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="#">
            <span data-feather="home"></span>
            Admin Panel
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Str::of(url()->current())->contains("/users") ? "active" : ""}}"
           href="/users">
            <span data-feather="users"></span>
            Users
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Str::of(url()->current())->contains("/categories") ? "active" : ""}}"
           href="/categories">
            <span data-feather="grid"></span>
            Categories
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Str::of(url()->current())->contains("/products") ? "active" : ""}}"
           href="/products">
            <span data-feather="grid"></span>
            Products
        </a>
    </li>
</ul>
