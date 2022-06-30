const editFormNav = document.querySelector(
    'a[data-toggle="tab"][href="#edit-form-pane"]'
);

const editForm = document.querySelector("#edit-form");

document.querySelectorAll('[data-action="edit"]').forEach((btn) => {
    btn.addEventListener("click", (e) => {
        editForm.setAttribute(
            "action",
            editForm.dataset.link.replace("#", btn.dataset.slug)
        );

        document.querySelector("#edit-form input[name='old-name']").value =
            btn.dataset.name;

        editFormNav.click();
    });
});
