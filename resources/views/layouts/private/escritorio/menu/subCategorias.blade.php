@canany(['subcategoria.index',  'subcategoria.all', 'subcategoria.create', 'subcategoria.edit', 'subcategoria.delete'])
  <li class="nav-item has-treeview {{ Request::is('subCategoria*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('subCategoria*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-dice"></i>
      <p>
        {{ __('SubCategorias') }}
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      @canany(['subcategoria.index', 'subcategoria.all', 'subcategoria.create','subcategoria.edit', 'subcategoria.delete'])
        <li class="nav-item">
          <a href="{{ url('/subCategorias') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>{{ __('Lista de SubCategorias') }}</p>
          </a>
        </li>
      @endcanany
      @can('subcategoria.create')
        <li class="nav-item">
          <a href="{{ url('/subCategorias/crear') }}" class="nav-link {{ Request::is('subCategorias/crear') ? 'active' : '' }}">
            <i class="nav-icon far fa-plus-square"></i>
            <p>{{ __('Registrar SubCategoria') }}</p>
          </a>
        </li>
        @endcan
    </ul>
  </li>
@endcanany