window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar");
    if (window.scrollY > 10) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});

function toggleLike(btn, memeId) {
    const icon = btn.querySelector("i");
    const numbersOfLikes = btn
        .closest(".post-card")
        .querySelector("span.nLikes");

    const isLiked = icon.classList.contains("fas");

    const endpoints = isLiked
        ? `/api/liked/${memeId}`
        : `/api/disliked/${memeId}`;

    fetch(endpoints, {
        method: "POST",
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                icon.classList.toggle("fas");
                icon.classList.toggle("far");
                btn.classList.toggle("liked");
                numbersOfLikes.innerText = data.likes;
            } else {
                console.log("Deu ruim doido!");
            }
        })
        .catch((error) => console.log(error));
}

function checkInput(input) {
    const btn = input.nextElementSibling;
    btn.disabled = input.value.trim().length === 0;
}

function addComment(form, event) {
    event.preventDefault();
    const input = form.querySelector(".comment-input");
    const commentsSection = form.previousElementSibling;

    if (input.value.trim()) {
        const newComment = document.createElement("div");
        newComment.className = "comment";
        newComment.innerHTML = `<span class="fw-bold">você</span> ${input.value}`;
        commentsSection.appendChild(newComment);
        input.value = "";
        form.querySelector(".post-btn").disabled = true;
    }
    return false;
}

// TODO:
// Criar função de dar like e enviar para o banco de dados
// Criar usuarios e fazer validações
// Criar db comentarios
// Refatorar routes
// Rota para adicionar o comentario /api/comment/{id_meme}
// Rota para remover /api/del/commment/{id_meme}
// Rota para update /api/update/commment/{id_meme}
// olhar numero de objs na pagina para fazer o load
