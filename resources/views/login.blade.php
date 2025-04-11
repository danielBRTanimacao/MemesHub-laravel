<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>{{ $title }}</title>
</head>
<body>
    <form action="{{ route('login') }}" method="POST" class="d-flex justify-content-center align-items-center" style="height: 100dvh">
        @csrf
        <div>
            <div class="mb-3">
                <label for="nameId" class="form-label">Nome:</label>
                <input name="name" type="text" class="form-control" id="nameId" required>
            </div>
            <div class="mb-3">
                <label for="passwordId" class="form-label">Senha:</label>
                <input name="password" type="password" class="form-control" id="passwordId" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="showPassword">
                <label class="form-check-label" for="showPassword">Mostrar senha</label>
            </div>
            <div class="mb-3 form-check">
                <a href="{{ route('registerForm') }}">Register</a>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
