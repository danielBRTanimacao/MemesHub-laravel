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
                    "justify-center",
                    "h-[70dvh]"
                );

                memeDiv.innerHTML = `
                    <h4>${e.name}</h4>
                    <img width="300" id="meme-img" src="${e.image}" alt="${e.image}">
                    <div class="flex items-center">
                        <button data-liked="false" type="button" class="text-xl flex flex-col cursor-pointer like-btn">
                            <i class="bi bi-heart"></i>
                            <span class="text-sm">
                                ${e.likes}
                            </span>
                        </button>
                        <button type="button" class="text-xl flex flex-col cursor-pointer">
                            <i class="bi bi-chat-dots"></i>
                            <span class="text-sm">
                                ${e.comments}
                            </span>
                        </button>
                        <small class="">${e.description}</small>
                    </div>
                `;

                const btnLike = memeDiv.querySelector(".like-btn");

                btnLike.addEventListener("click", () => {
                    const liked = btnLike.getAttribute("data-liked") === "true";

                    if (liked) {
                        btnLike.innerHTML = `
                            <i class="bi bi-heart"></i>
                            <span class="text-sm">
                                ${e.likes + 1}
                            </span>
                        `;
                        btnLike.setAttribute("data-liked", "false");
                    } else {
                        btnLike.innerHTML = `
                            <i class="bi bi-heart-fill text-red-800"></i>
                            <span class="text-sm">
                                ${e.likes - 1}
                            </span>
                        `;
                        btnLike.setAttribute("data-liked", "true");
                    }
                });

                mainMemes.appendChild(memeDiv);
            });
        });
};

getMemes();

// TODO:
// iniciar um design para adicionar comentarios
// Criar tipo um form, text e post
// Refatorar função utilizando metodologia clean
// Criar usuario

// Criar db comentarios
// Rota para adicionar o comentario /api/comment/{id_meme}
// Rota para remover /api/del/commment/{id_meme}
// Rota para update /api/update/commment/{id_meme}
//
