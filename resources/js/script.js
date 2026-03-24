document.addEventListener("DOMContentLoaded", () => {
    // Debounce Search(catalogo)
    const form = document.getElementById("filtersForm");
    const searchInput = document.getElementById("searchInput");

    if (form && searchInput) {
        let timer;

        searchInput.addEventListener("input", () => {
            clearTimeout(timer);

            timer = setTimeout(() => {
                form.submit();
            }, 300);
        });
    }

    // Preview Immagine (Admin)
    const imageInput = document.getElementById("image");
    const previewImage = document.getElementById("previewImage");

    if (imageInput && previewImage) {
        imageInput.addEventListener("change", function (event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = "block";
                };

                reader.readAsDataURL(file);
            }
        });
    }
});
