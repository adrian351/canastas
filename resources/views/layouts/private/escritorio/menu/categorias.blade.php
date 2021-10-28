@canany(['categoria.index', 'categoria.create', 'categoria.edit', 'categoria.delete'])
  <li class="nav-item has-treeview {{ Request::is('categoria*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('categoria*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-dice-five"></i>
      <p>
        {{ __('Categorias') }}
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      @canany(['categoria.index', 'categoria.create','categoria.edit', 'categoria.delete'])
        <li class="nav-item">
          <a href="{{ url('/categorias') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>{{ __('Lista de categorias') }}</p>
          </a>
        </li>
      @endcanany
      @can('categoria.create')
        <li class="nav-item">
          <a href="{{ url('/categorias/crear') }}" class="nav-link {{ Request::is('categoria/crear') ? 'active' : '' }}">
            <i class="nav-icon far fa-plus-square"></i>
            <p>{{ __('Registrar categoria') }}</p>
          </a>
        </li>
        @endcan
    </ul>
  </li>
@endcanany