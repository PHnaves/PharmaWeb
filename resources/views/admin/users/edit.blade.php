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
    {{-- mensagens de sucesso --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h2>Editar Usuário</h2>
    <form action="{{ route('admin.users.update', $user) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="mb-3">
            <label for="type_user" class="form-label">Tipo de Usuário</label>
            <select class="form-select" id="type_user" name="type_user" required>
                <option value="">Selecione...</option>
                <option value="Administrador" {{ old('type_user', $user->type_user ?? '') == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="Farmaceutico" {{ old('type_user', $user->type_user ?? '') == 'Farmaceutico' ? 'selected' : '' }}>Farmacêutico</option>
                <option value="medico" {{ old('type_user', $user->type_user ?? '') == 'medico' ? 'selected' : '' }}>Médico</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="work_location" class="form-label">Local de Trabalho</label>
            <select class="form-select" id="work_location" name="work_location" required>
                <option value="">Selecione...</option>
                <option value="UBS1" {{ old('work_location', $user->work_location ?? '') == 'UBS1' ? 'selected' : '' }}>UBS1</option>
                <option value="UPA1" {{ old('work_location', $user->work_location ?? '') == 'UPA1' ? 'selected' : '' }}>UPA1</option>
                <option value="UBS2" {{ old('work_location', $user->work_location ?? '') == 'UBS2' ? 'selected' : '' }}>UBS2</option>
                <option value="UPA2" {{ old('work_location', $user->work_location ?? '') == 'UPA2' ? 'selected' : '' }}>UPA2</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <form class="mt-3" action="{{ route('admin.users.update.password', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Senha Atual</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" required>
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">Nova Senha</label>
            <input id="update_password_password" name="new_password" type="password" class="form-control" autocomplete="new-password" required>
        </div>

        <div class="mb-4">
            <label for="update_password_password_confirmation" class="form-label">Confirmar Nova Senha</label>
            <input id="update_password_password_confirmation" name="new_password_confirmation" type="password" class="form-control" autocomplete="new-password" required>
        </div>

        <button type="submit" class="btn btn-secondary w-100">
            <i class="bi bi-key-fill me-1"></i> Salvar Nova Senha
        </button>
    </form>
</div>
@endsection
