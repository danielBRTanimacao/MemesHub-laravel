const getMemes = () => {
    fetch("http://127.0.0.1:8000/api")
        .then((response) => response.json())
        .then((data) => {
            const mainMemes = document.querySelector("main#showMemes");

            data.forEach((e) => {
                const memeDiv = document.createElement("div");
                memeDiv.classList.add(
                    "pt-2",
                    "flex",
                    "flex-col",
                    "items-center",
                    "justify-center"
                );
                memeDiv.innerHTML = `
                    <img width="200" id="meme-img" src="${e.image}" alt="${e.image}">
                    <div class="flex">
                        <button data-liked="false" type="button" class="cursor-pointer like-btn">
                            <i class="bi bi-hand-thumbs-up"></i>
                        </button>
                        <div class="ps-2">
                            <h4>${e.name}</h4>
                        </div>
                    </div>
                    <small>${e.description}</small>
                `;

                // TODO:
                // Colocar um coração no lugar do like
                // Modificar banco de dados MEMES adicionar like, e numero de comentarios
                // Adicionar o contador de likes
                // No backend criar rota /api/liked/{id_meme} Criar logica para apenas 1 like do post especifico
                // Rota para deslike /api/disliked/{id_meme} Criar logica para remover 1 like do post especifico
                // iniciar um design para adicionar comentarios
                // Criar tipo um form, text e post
                // Refatorar função utilizando metodologia clean
                // Criar usuario

                // Criar db comentarios
                // Rota para adicionar o comentario /api/comment/{id_meme}
                // Rota para remover /api/del/commment/{id_meme}
                // Rota para update /api/update/commment/{id_meme}
                //

                const btnLike = document.querySelectorAll(".like-btn");

                btnLike.forEach((e) => {
                    e.addEventListener("click", () => {
                        const liked = e.getAttribute("data-liked") === "true";

                        if (liked) {
                            e.innerHTML =
                                '<i class="bi bi-hand-thumbs-up"></i>';
                            e.setAttribute("data-liked", "false");
                        } else {
                            e.innerHTML =
                                '<i class="bi bi-hand-thumbs-up-fill"></i>';
                            e.setAttribute("data-liked", "true");
                        }
                    });
                });

                mainMemes.appendChild(memeDiv);
            });
        });
};

getMemes();
