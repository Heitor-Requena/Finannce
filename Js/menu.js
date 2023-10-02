window.addEventListener("scroll", function(){
    let header = document.querySelector('#header')
    header.classList.toggle('rolagem', window.scrollY > 500)
});

let count = 1;

function check() {
    document.getElementById("radio1").checked = true;
}

setInterval(function() {
    nextImage();
}, 15000);

function nextImage() {
    count++;
    if (count > 4) { //mudar ao add slides
        count = 1;
    }

    document.getElementById("radio" + count).checked = true;
};

const hamburger = document.querySelector(".hamburger");
const nav = document.querySelector(".nav");

hamburger.addEventListener("click", () => nav.classList.toggle("active"));