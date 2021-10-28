@canany(['marca.index', 'marca.create','marca.edit', 'marca.delete'])
  <li class="nav-item has-treeview {{ Request::is('marca*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('marca*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-tags"></i>
      <p>
        {{ __('Marcas') }}
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      @canany(['marca.index', 'marca.create','marca.edit', 'marca.delete'])
        <li class="nav-item">
          <a href="{{ url('/marcas') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>{{ __('Lista de marcas') }}</p>
          </a>
        </li>
      @endcanany
      @can('marca.create')
        <li class="nav-item">
          <a href="{{ url('/marcas/crear') }}" class="nav-link {{ Request::is('marca/crear') ? 'active' : '' }}">
            <i class="nav-icon far fa-plus-square"></i>
            <p>{{ __('Registrar marcas') }}</p>
          </a>
        </li>
        @endcan
    </ul>
  </li>
@endcanany