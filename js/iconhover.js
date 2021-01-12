var iconimgs = document.getElementsByClassName("iconimg");
// iconimsg.addEventListener("mouseover",upscaleImg());
// iconimsg.addEventListener("mouseleave",upscaleImg());

for (var i = 0 ; i < iconimgs.length; i++) {
    let button = document.createElement("button");
    button.innerHTML="Choisir";
    button.classList.add("smallbutton");
    iconimgs[i].parentElement.appendChild(button);
    button.style.display="none";
    button.setAttribute('onClick',`window.location.href='/functions/profil/changeIcon?icon=-${i}';`);

    iconimgs[i].parentElement.addEventListener("mouseover",function () {
        // this.classList.add("upscale");
        this.firstChild.classList.add("upscale");
        button.style.display="inline-block";
        // console.log(this.parentElement);
      });

    iconimgs[i].parentElement.addEventListener("mouseleave",function () {
     // this.classList.remove("upscale");
     this.firstChild.classList.remove("upscale");
        button.style.display="none";
    });
 }

// console.log("click");
// function upscaleImg(){
//     console.log(this);
//     // this.classList.toggle("upscale");
//     console.log("click");
// }