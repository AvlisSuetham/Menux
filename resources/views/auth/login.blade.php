@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    @if($errors->has('login'))
        <div class="alert alert-danger">
            {{ $errors->first('login') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf
        <div class="mb-3">
            <input type="text" name="usuario" placeholder="Usuário" required class="form-control" autofocus>
        </div>
        <div class="mb-3">
            <input type="password" name="senha" placeholder="Senha" required class="form-control">
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>

    <p class="mt-3 text-center">
        <a href="/register">Criar nova conta</a>
    </p>
@endsection
