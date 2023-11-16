var Ckeditor = (function () {
    // Private functions
    var demos = function () {
        ClassicEditor.create(document.querySelector("#kt-ckeditor-1"))
            .then((editor) => {
                console.log(editor);
            })
            .catch((error) => {
                console.error(error);
            });
    };

    return {
        // public functions
        init: function () {
            demos();
        },
    };
})();

// Initialization
jQuery(document).ready(function () {
    Ckeditor.init();
});
// let btn1 = document.querySelector(".bebtn");
// btn1.classList.add("off-btn");
//
// btn1.addEventListener("click", () => {
//     btn1.classList.toggle("off-btn");
//     btn1.classList.toggle("on-btn");
// });

const
    input = document.querySelector(".cancel-all-input"),
    tagNumb = document.querySelector(".details span"),
    ul = document.querySelector(".wrapper-ul");
let tags = ["HTML", "CSS",'jyj'];
createTag();
function createTag() {
    ul.querySelectorAll("li").forEach(li => li.remove());
    tags.slice().reverse().forEach(tag => {
        let liTag = `<li>${tag} <img src='/img/popup-close.png' onclick="remove(this, '${tag}')"></li>`;
        ul.insertAdjacentHTML("afterbegin", liTag);
    });
}
function remove(element, tag) {
    let index = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    element.parentElement.remove();
    // countTags();
}
// let adding = document.querySelector('.ffff');
function addTag(e) {
    e.preventDefault();

    if (e.key == "Enter") {
        let tag = e.target.value.replace(/\s+/g, ' ');
        if (tag.length > 1 && !tags.includes(tag)) {
            if (tags.length < 10) {
                tag.split(',').forEach(tag => {
                    tags.push(tag);
                    createTag();
                });
            }
        }
        e.target.value = "";
    }

}
input.addEventListener("keyup",()=> addTag);
let forme = document.querySelector('.h-form');
let submitInput = document.querySelector('.h-input');

$('.h-form input').not('.h-input ,.cancel-all-input ').keydown(function(e){
    if(e.keyCode == 13){
        e.preventDefault();
        return false;
    }
})
// form.submit(function(e){
//     // e.preventDefault();
//     // this.unbind('submit').submit();
//     if(!submitInput){
//
//         e.preventDefault();
//     }
//
// })
