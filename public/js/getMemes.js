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
                        <button data-liked="false" id="like-btn" type="button" class="cursor-pointer">
                            <i class="bi bi-hand-thumbs-up"></i>
                        </button>
                        <div class="ps-2">
                            <h4>${e.name}</h4>
                        </div>
                    </div>
                    <small>${e.description}</small>
                `;

                const btnLike = document.querySelectorAll("#like-btn");

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
