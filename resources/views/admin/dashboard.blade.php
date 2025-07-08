@extends('layouts.admin')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h2 class="mb-3">Bem-vindo ao Painel do Administrador</h2>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Gerenciar Usuários</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
