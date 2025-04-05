const getMemes = () => {
    fetch("http://127.0.0.1:8000/api")
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
        });
};

getMemes();
