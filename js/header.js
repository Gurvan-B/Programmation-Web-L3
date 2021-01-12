// document.getElementById("dropmenu").addEventListener("mouseover",dropMenu);
// document.getElementById("dropmenu").addEventListener("mouseleave",dropMenu);

dropdown = document.getElementById("dropdown");
document.getElementById("dropmenu").addEventListener("click",function(ev){
    dropdown.classList.toggle("show");
    ev.stopPropagation(); // Empêche l'evenement click de se faire détecter par le 2e listener (celui sur le tout le document)
});
document.addEventListener("click",function(){
    dropdown.classList.remove("show");
});
