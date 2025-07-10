@extends('layouts.auth')

@section('title', 'Registrar')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <div class="mb-3">
            <input type="text" name="usuario" placeholder="Usuário" required class="form-control" autofocus>
        </div>

        <div class="mb-3">
            <input type="text" name="nome" placeholder="Nome completo" required class="form-control">
        </div>

        <div class="mb-3">
            <input type="email" name="email" placeholder="E-mail" required class="form-control">
        </div>

        <div class="mb-3">
            <input type="text" name="cpf" placeholder="CPF" required class="form-control">
        </div>

        <div class="mb-3 position-relative">
            <input id="senha" type="password" name="senha" placeholder="Senha" required class="form-control">
            <button type="button" class="btn btn-sm btn-outline-primary position-absolute top-50 end-0 translate-middle-y me-2" 
                onclick="toggleSenha('senha')">
                Mostrar
            </button>
        </div>

        <div class="mb-3 position-relative">
            <input id="senha_confirmation" type="password" name="senha_confirmation" placeholder="Confirmar senha" required class="form-control">
            <button type="button" class="btn btn-sm btn-outline-primary position-absolute top-50 end-0 translate-middle-y me-2" 
                onclick="toggleSenha('senha_confirmation')">
                Mostrar
            </button>
        </div>

        <button type="submit" class="btn btn-primary w-100">Registrar</button>
    </form>

    <p class="mt-3 text-center">
        <a href="/login">Já tem conta? Faça login</a>
    </p>

    <script>
        function toggleSenha(id) {
            const input = document.getElementById(id);
            const btn = input.nextElementSibling;
            if (input.type === "password") {
                input.type = "text";
                btn.textContent = "Ocultar";
            } else {
                input.type = "password";
                btn.textContent = "Mostrar";
            }
        }
    </script>
@endsection
