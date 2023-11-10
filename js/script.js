document.querySelector(".hamburger-menu").addEventListener("click", ()=>{
    document.querySelector(".nav-links").classList.toggle("show-menu");
});

document.querySelector(".nav-links").addEventListener("click", ()=>{
    document.querySelector(".nav-links").classList.remove("show-menu");
});