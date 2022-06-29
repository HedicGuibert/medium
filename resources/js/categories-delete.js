window.addEventListener("DOMContentLoaded", () => {
    const deleteForm = document.querySelector("#delete-form");

    document.querySelectorAll('[data-action="delete"]').forEach((el) => {
        el.addEventListener("click", () => {
            deleteForm.setAttribute(
                "action",
                `${deleteForm.dataset.link.replace("#", el.dataset.slug)}`
            );

            deleteForm.submit();
        });
    });
});
