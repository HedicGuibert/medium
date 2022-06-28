const deleteForm = document.querySelector("#delete-form");

document.querySelectorAll('[data-action="delete"]').forEach((el) => {
    el.addEventListener("click", (e) => {
        console.log(e.target.dataset);

        deleteForm.setAttribute(
            "action",
            `${deleteForm.dataset.link.replace("#", e.target.dataset.slug)}`
        );

        deleteForm.submit();
    });
});
