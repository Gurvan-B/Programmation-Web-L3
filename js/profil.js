document.getElementById("buttonmdp").addEventListener("click",toggleModify);
document.getElementById("profildelete").addEventListener("click",deleteProfile);

function toggleModify(){
    let nodemdp = document.getElementById("profilmdp");
    let nodebuttonmdp = document.getElementById("buttonmdp");
    nodemdp.classList.toggle("modify");
    if (nodemdp.classList.contains("modify")){
        nodemdp.removeChild(nodebuttonmdp);
        let newul = document.createElement('ul');
        newul.classList.add('formul');
        newul.innerHTML = 
        "<form id=formmdp method='POST' action='/functions/profil/updatePass'>"+
            "<li><input class=smallinput id=p1 name=newpass type=password placeholder='Nouveau mot de passe' required/></li>"+
            "<li><input id=p2 class=smallinput type=password placeholder='Confirmer le mot de passe' required/></li>"+
            "<li><input type=submit class=smallbutton onCLick=verifymdp()></input></li>"+
        "</form>";
        nodemdp.appendChild(newul);
        // Pourrait être beaucoup plus propre et simple en utilisant css (propriété display) mais je choisit d'essayer cette méthode
    }
}
// Function appellée par le boutton du formulaire dans newul
function verifymdp(){
    let p1 = document.getElementById("p1");
    let p2 = document.getElementById("p2");
    let formmdp= document.getElementById("formmdp");
    formmdp.addEventListener("submit",function(e){
        e.preventDefault(); // Permet de d'empêcher l'envoit par défaut du formulaire quand le boutton est pressé
        if (p1.value == p2.value && p1.value!=""){
            // alert("Mots de passe corrects");
            formmdp.submit();
        } else {
            p1.value="";
            p2.value="";
            alert('Veuillez entrer deux mots de passe identiques');
        }
    });
}

function deleteProfile(){
    if(confirm("Voulez vous vraiment supprimer votre compte ?")){
        window.location.href="/functions/profil/deleteProfil";
    }
}

// Affichage de la date dans la balise div #date

let today = new Date();
let divdate = document.getElementById("date");
let date = today.getDate()+ " / " +(today.getMonth()+1 + " / " + today.getFullYear());
divdate.innerHTML = date;