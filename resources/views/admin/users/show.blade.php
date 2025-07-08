@extends('layouts.admin')
@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h3>Detalhes do Usuário</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Tipo:</strong> {{ $user->type_user }}</p>
            <p><strong>Local de Trabalho:</strong> {{ $user->work_location }}</p>
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection
