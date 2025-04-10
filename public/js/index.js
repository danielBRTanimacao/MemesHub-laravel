window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar");
    if (window.scrollY > 10) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});

function toggleLike(btn) {
    const icon = btn.querySelector("i");
    // const numbersOfLikes = document.querySelector("span.nLikes");
    icon.classList.toggle("fas");
    icon.classList.toggle("far");
    btn.classList.toggle("liked");

    // const sum = Number(numbersOfLikes.innerHTML) + 1;
    // numbersOfLikes.innerHTML = sum;
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
// Criar db comentarios
// Refatorar routes
// Rota para adicionar o comentario /api/comment/{id_meme}
// Rota para remover /api/del/commment/{id_meme}
// Rota para update /api/update/commment/{id_meme}
// olhar numero de objs na pagina para fazer o load
