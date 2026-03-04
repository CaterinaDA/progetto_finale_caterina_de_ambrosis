document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("filtersForm");
    const searchInput = document.getElementById("searchInput");

    if (!form || !searchInput) return;

    let timer;

    searchInput.addEventListener("input", () => {
        clearTimeout(timer);

        timer = setTimeout(() => {
            form.submit();
        }, 300);
    });
});
