const anchors = document.querySelectorAll("#anchor");
const badge = document.getElementById("badge");
const accordion = document.querySelectorAll(".respond");
const textArea = document.getElementById("textArea");
const form = document.getElementById("form");
accordion.forEach(item => item.addEventListener("click", function (e){
    e.stopPropagation()
}))
//When user click on respond button to comment move viewport to the comment section
anchors.forEach(item => item.addEventListener("click", function(){
    document.getElementById('comment').scrollIntoView({
        behavior: 'smooth'
    });
    badge.innerHTML =`<button type="button" class="btn btn-outline-primary btn-rounded" onclick="deleteBadge(this)" id="button_response" value="${item.getAttribute("data-id")}">${item.getAttribute("data-name")} <i style="vertical-align: middle;" class="icon-times-circle"></i></button>`;
    form.innerHTML = `<input hidden id="comment_id" name="comment_id" value="${ item.getAttribute("data-id") }">`;
    textArea.placeholder = `Vous répondez à ${ item.getAttribute("data-name") }`
}))
function deleteBadge (e){
    e.remove();
    textArea.placeholder = "Votre message";
    document.getElementById("comment_id").remove();
}

