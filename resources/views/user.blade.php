<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>{{ $title }}</title>
</head>
<body>
    <main>
        <div class="text-center shadow-lg pb-4">
            <a href="{{ route('index') }}" class="d-block text-decoration-none">Voltar</a>
            <div class="pt-3">
                <img class="rounded-circle" src="https://i.pravatar.cc/150?img=1" alt="User Avatar">
            </div>
            <h3 class="lead pt-1">{{ Auth::user()->name }}</h3>
            <div class="d-flex justify-content-center gap-2 pt-2">
                <a class="btn btn-danger" href="{{ route('logout') }}">Sair</a>
                <a class="btn btn-primary" href="{{ route('updateForm', [Auth::user()->id, Auth::user()->name]) }}">Update</a>
            </div>
        </div>

        <div class="container mt-4 py-2">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
                @foreach ($memes as $meme)
                    <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalOptionsPost">
                            <div class="position-relative">
                                <img class="img-fluid rounded" src="{{ asset('storage/' . $meme['image']) }}" alt="meme" style="object-fit: cover; width: 100%; height: 300px;">
                                <div class="rounded-bottom position-absolute bottom-0 start-0 bg-dark bg-opacity-50 text-white p-1 w-100 d-flex gap-2 px-2">
                                    <small><i class="far fa-heart"></i> {{ $meme['likes'] ?? 0 }}</small>
                                    <small><i class="far fa-comment"></i> {{ $meme['comments'] ?? 0 }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <div class="modal fade" id="modalOptionsPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalOptionsPostLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalOptionsPostLabel">Opções do Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Conteúdo do post ou opções aqui.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
