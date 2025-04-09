<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>index</title>
</head>
<body>
    <nav class="navbar py-2">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="#">HubMemes</a>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Pesquisar memes...">
                <i class="fas fa-search search-icon"></i>
            </div>
            <div style="width: 100px;"></div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="row">
            <!-- Barra Lateral Esquerda -->
            <div class="col-lg-3 col-md-3 d-none d-md-block">
                <div class="sidebar-left bg-white p-3 rounded shadow-sm">
                    <h5 class="mb-3">Categorias Populares</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-dark"><i class="fas fa-fire me-2"></i>Trending</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-dark"><i class="fas fa-laugh-squint me-2"></i>Memes Engraçados</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-dark"><i class="fas fa-gamepad me-2"></i>Games</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-dark"><i class="fas fa-film me-2"></i>Filmes &amp; TV</a></li>
                    </ul>
                    <h5 class="mb-3 mt-4">Favoritos de charles</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-light text-dark">#funny</span>
                        <span class="badge bg-light text-dark">#viral</span>
                        <span class="badge bg-light text-dark">#games</span>
                        <span class="badge bg-light text-dark">#anime</span>
                    </div>
                </div>
            </div>
            
            <!-- Conteúdo Principal -->
            <div class="col-lg-6 col-md-6">
                <!-- Post Card -->
                <div class="post-card">
                    <div class="post-header">
                        <img src="https://i.pravatar.cc/150?img=1" alt="User Avatar">
                        <span class="fw-bold">meme_lover</span>
                    </div>
                    <div class="post-image">
                        <img src="https://static.wikia.nocookie.net/dead-rails/images/7/79/Bigwolf.jpg" alt="Meme">
                    </div>
                    <div class="post-actions">
                        <button class="action-btn" onclick="toggleLike(this)">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="action-btn">
                            <i class="far fa-comment"></i>
                        </button>
                        <button class="action-btn">
                            <i class="far fa-paper-plane"></i>
                        </button>
                    </div>
                    <div class="likes">1,234 curtidas</div>
                    <div class="comments-section">
                        <div class="comment">
                            <span class="fw-bold">user123</span> Muito bom! 😂
                        </div>
                        <div class="comment">
                            <span class="fw-bold">meme_master</span> Sensacional!
                        </div>
                    </div>
                    <form class="comment-form" onsubmit="return addComment(this, event)">
                        <input type="text" class="comment-input" placeholder="Adicione um comentário..." oninput="checkInput(this)">
                        <button type="submit" class="post-btn" disabled="">Publicar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal to add POST -->
    <div class="position-fixed bottom-0 end-0 p-4" style="z-index: 1000;">
        <button class="btn btn-primary rounded-circle shadow-lg upload-btn" style="width: 60px; height: 60px;" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <i class="fas fa-plus"></i>
        </button>
    </div>
    <div class="modal fade" id="uploadModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Compartilhar Meme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Escolha uma imagem</label>
                        <input type="file" class="form-control" accept="image/*" id="img-fild">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nome do seu Meme</label>
                        <input type="text" class="form-control" placeholder="Qual nome dele..." id="name-fild">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea class="form-control" rows="3" placeholder="Adicione uma descrição..." id="description-fild"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Compartilhar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset("js/getMemes.js") }}"></script>
    <script src="{{ asset("js/postMeme.js") }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>