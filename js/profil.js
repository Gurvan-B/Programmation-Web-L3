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
        newul.innerHTML = "<form id=formmdp method='POST' action='/functions/profil/updatePass'><li><input class=smallinput id=p1 name=newpass type=password placeholder='Nouveau mot de passe' required/></li><li><input id=p2 class=smallinput type=password placeholder='Confirmer le mot de passe' required/></li></form><li><button class=smallbutton onCLick=verifymdp()>Envoyer</button></li>";
        nodemdp.appendChild(newul);
        // Pourrait être beaucoup plus propre et simple en utilisant css mais j'ai choisit d'essayer cette méthode
    }
}

function verifymdp(){
    let p1 = document.getElementById("p1");
    let p2 = document.getElementById("p2");
    let formmdp= document.getElementById("formmdp");
    if (p1.value == p2.value && p1.value!=""){
        // alert("Mots de passe corrects");
        formmdp.submit();
    } else {
        // alert("Mots de passe différents");
        p1.value="";
        p2.value="";
        alert('Veuillez entrer deux mots de passe identiques')
        //formmdp.childNodes('p').innerHTML = "Mots de passe différents";
        
    }
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