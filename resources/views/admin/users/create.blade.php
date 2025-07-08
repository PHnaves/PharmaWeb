@extends('layouts.admin')
@section('content')
<div class="container py-4">
    {{-- mensagens de erro  --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2>Cadastrar Usuário</h2>
    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Confirmar Senha</label>
            <input type="password" class="form-control" id="password" name="password_confirmation" required>
        </div>
        <div class="mb-3">
            <label for="type_user" class="form-label">Tipo de Usuário</label>
            <select class="form-select" id="type_user" name="type_user" required>
                <option value="">Selecione...</option>
                <option value="Administrador">Administrador</option>
                <option value="Farmaceutico">Farmacêutico</option>
                <option value="medico">Médico</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="work_location" class="form-label">Local de Trabalho</label>
            <select class="form-select" id="work_location" name="work_location" required>
                <option value="">Selecione...</option>
                <option value="UBS1">UBS1</option>
                <option value="UPA1">UPA1</option>
                <option value="UBS2">UBS2</option>
                <option value="UPA2">UPA2</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
