<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-4" style="min-width:350px;">
            <h2 class="mb-4 text-center">Login</h2>
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required autofocus value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="type_user" class="form-label">Tipo de Usuário</label>
                    <select class="form-select" id="type_user" name="type_user" required>
                        <option value="">Selecione...</option>
                        <option value="Administrador" {{ old('type_user') == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                        <option value="Farmaceutico" {{ old('type_user') == 'Farmaceutico' ? 'selected' : '' }}>Farmacêutico</option>
                        <option value="medico" {{ old('type_user') == 'medico' ? 'selected' : '' }}>Médico</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="work_location" class="form-label">Local de Trabalho</label>
                    <select class="form-select" id="work_location" name="work_location" required>
                        <option value="">Selecione...</option>
                        <option value="UBS1" {{ old('work_location') == 'UBS1' ? 'selected' : '' }}>UBS1</option>
                        <option value="UPA1" {{ old('work_location') == 'UPA1' ? 'selected' : '' }}>UPA1</option>
                        <option value="UBS2" {{ old('work_location') == 'UBS2' ? 'selected' : '' }}>UBS2</option>
                        <option value="UPA2" {{ old('work_location') == 'UPA2' ? 'selected' : '' }}>UPA2</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>
