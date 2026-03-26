document.addEventListener("DOMContentLoaded", () => {
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
                    previewImage.classList.remove("d-none");
                };

                reader.readAsDataURL(file);
            }
        });
    }
});
