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
                        <button data-liked="false" type="button" class="text-xl flex flex-col cursor-pointer like-btn">
                            <i class="bi bi-heart"></i>
                            <span class="text-sm">
                                ${e.likes}
                            </span>
                        </button>
                        <div class="ps-2">
                            <h4>${e.name}</h4>
                        </div>
                    </div>
                    <small>${e.description}</small>
                `;

                const btnLike = document.querySelectorAll(".like-btn");

                btnLike.forEach((btn) => {
                    btn.addEventListener("click", () => {
                        const liked = btn.getAttribute("data-liked") === "true";

                        if (liked) {
                            btn.innerHTML = `
                                <i class="bi bi-heart"></i>
                                <span class="text-sm">
                                    ${e.likes}
                                </span>
                            `;

                            btn.setAttribute("data-liked", "false");
                        } else {
                            btn.innerHTML = `
                                <i class="bi bi-heart-fill text-red-800"></i>
                                <span class="text-sm">
                                    ${e.likes}
                                </span>
                            `;
                            btn.setAttribute("data-liked", "true");
                        }
                    });
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
