@extends('auth.inicio')
@section('header')
<title>@section('title', __('Acceder'))</title>
@endsection
@section('recapcha')
{!! htmlScriptTagJsApi([
  'action' => 'homepage',
  'callback_then' => 'callbackThen',
  'callback_catch' => 'callbackCatch'
]) !!}
@endsection
@section('contenido-inicio')
<form method="POST" action="{{ route('login') }}" class="login100-form" onsubmit="return checarBotonSubmit('btnsubmit')">
  @csrf
  @include('layouts.public.logo')
  <div class="card-body shadow-lg">
    <div class="row">
      <div class="form-group col-sm">
        <label for="email">{{ __('Correo electrónico') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text btn-sm"><i class="fas fa-envelope"></i></span>
          </div>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Correo electrónico') }}" required autocomplete="email" autofocus>
        </div>
        <span class="text-danger">{{ $errors->first('email') }}</span>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm">
        <label for="email">{{ __('Contraseña') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text btn-sm"><i class="fas fa-lock"></i></span>
          </div>
          <input id="txtpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Contraseña') }}" required autocomplete="current-password">
          <span class="input-group-append">
            <button id="show_password" class="btn btn-info btn-flat btn-sm" type="button" onclick="mostrarPassword('txtpassword', 'show_password', 'icon')"><span class="fa fa-eye-slash icon"></span></button>
          </span>
        </div>
        <span class="text-danger">{{ $errors->first('password') }}</span>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm">
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
          {{ __('Recuérdame') }}
        </label>
      </div>
       <div class="form-group col-sm text-right">
          @if (Route::has('password.request'))
            <a class="link" href="{{ route('password.request') }}">
              {{ __('¿Olvidaste tu contraseña?') }}
            </a>
          @endif
       </div>
    </div>
    <div class="row justify-content-center">
      <button type="submit" class="btn btn-primary w-75 p-2" id="btnsubmit">
        <i class="fas fa-sign-in-alt"></i> {{ __('Acceder') }}
      </button>
    </div>
    <hr>
    @include('layouts.redesSociales')
  </div>
</form>
@endsection