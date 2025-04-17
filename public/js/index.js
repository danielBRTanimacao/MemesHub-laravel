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

    const isLiked = icon.classList.contains("far");

    const endpoints = isLiked
        ? `/api/liked/${memeId}`
        : `/api/disliked/${memeId}`;

    fetch(endpoints, {
        method: "POST",
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                icon.classList.toggle("far");
                icon.classList.toggle("fas");
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
    const memeId = form.getAttribute("data-meme-id");

    if (input.value.trim()) {
        fetch(`/api/comment/${memeId}`, {
            method: "POST",
            body: JSON.stringify({ text: input.value.trim() }),
        })
            .then((res) => res.json())
            .then((data) => {
                if (data.success) {
                    const newComment = document.createElement("div");
                    newComment.className = "comment";
                    newComment.innerHTML = `<span class="fw-bold">${data.comment.user}</span> ${data.comment.text}`;
                    commentsSection.appendChild(newComment);

                    const counter = form
                        .closest(".post-card")
                        .querySelector(".nComments");
                    counter.innerText = data.total;

                    input.value = "";
                    form.querySelector(".post-btn").disabled = true;
                }
            })
            .catch((err) => console.log(err));
    }

    return false;
}

// TODO:
// Rota para update /api/update/commment/{id_meme}
// olhar numero de objs na pagina para fazer o load
