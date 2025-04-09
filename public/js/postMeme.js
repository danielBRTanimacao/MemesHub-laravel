document
    .querySelector("form.modal-content")
    .addEventListener("submit", async (e) => {
        e.preventDefault();

        const img = document.querySelector("input#img-fild").files[0];
        const name = document.querySelector("input#name-fild").value;
        const description = document.querySelector(
            "textarea#description-fild"
        ).value;

        // usar o new FormData
        const data = {
            image: img,
            name: name,
            description: description,
        };

        console.log(data);

        try {
            const response = await fetch("http://127.0.0.1:8000/api/create", {
                method: "POST",
                body: JSON.stringify(data),
            });

            if (response.ok) {
                console.log("enviado :)");
            }
        } catch (error) {
            console.log(error);
        }
    });
