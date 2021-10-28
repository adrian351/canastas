@canany(['usuario.index', 'usuario.create', 'usuario.show', 'usuario.edit', 'usuario.destroy'])
  <li class="nav-item">
    <a href="{{ route('usuario.index') }}" class="nav-link {{ Request::is('usuario') ? 'active' : '' }}">
      <i class="fas fa-list nav-icon"></i> {{ __('Lista de usuarios') }}
    </a>
  </li>
@endcanany
@can('usuario.create')
  <li class="nav-item">
    <a href="{{ route('usuario.create') }}" class="nav-link {{ Request::is('usuario/crear') ? 'active' : '' }}">
      <i class="fas fa-plus-square"></i> {{ __('Registrar usuario') }}
    </a>
  </li>
@endcan