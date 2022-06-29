window.addEventListener("DOMContentLoaded", () => {
    const deleteForm = document.querySelector("#delete-form");

    document.querySelectorAll('[data-action="delete"]').forEach((el) => {
        el.addEventListener("click", (e) => {
            deleteForm.setAttribute(
                "action",
                `${deleteForm.dataset.link.replace("#", e.target.dataset.slug)}`
            );

            deleteForm.submit();
        });
    });
});
