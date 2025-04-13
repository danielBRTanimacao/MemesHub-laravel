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
    <main class="row pt-4">
        <div class="text-center col-md-2 shadow-lg">
            <a href="{{ route("index") }}" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">voltar</a>
            <div class="pt-3">
                <img class="rounded-circle" src="https://i.pravatar.cc/150?img=1" alt="User Avatar">
            </div>
            <h3 class="lead pt-1">{{ Auth::user()->name }}</h3>
            <div class="row col gap-2">
                <div>
                    <a class="w-75 btn btn-danger" href="{{ route("logout") }}">Sair</a>
                </div>
                <div>
                    <a class="w-75 btn btn-primary" href="{{ route("updateForm", [Auth::user()->id, Auth::user()->name]) }}">Update</a>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div> <!-- Ajeitar essa parte remover -->
        <div class="col-md-6">
            @foreach ($memes as $meme)
                <div class="post-card">
                    <div class="d-flex justify-content-between">
                        <small class="ps-3 fw-light">
                            {{ $meme['name'] }}
                        </small>
                        <a href="#" class="btn fw-bold" data-bs-toggle="modal" data-bs-target="#modalOptionsPost">...</a>
                    </div>
                    <div class="post-actions">
                    
                        <button class="action-btn" onclick="toggleLike(this, {{ $meme['id'] }})">
                            <i class="far fa-heart"></i>
                            <small>{{ $meme['likes'] }}</small>
                        </button>
                       
                        <button class="action-btn">
                            <i class="far fa-comment"></i>
                            <small>{{ $meme['comments'] }}</small>
                        </button>
                    </div>
                    <div class="post-image bg-secondary-subtle">
                        <img src="{{ asset('storage/' . $meme['image']) }}" alt="{{ $meme['image'] }}">
                    </div>
                    
                </div>
            @endforeach
        </div>
    </main>
    <div class="modal fade" id="modalOptionsPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalOptionsPostLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalOptionsPostLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Understood</button>
            </div>
          </div>
        </div>
      </div>      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>