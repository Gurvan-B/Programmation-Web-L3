var xhr = new XMLHttpRequest();
var div = document.getElementById('ajax');

xhr.onreadystatechange = function() {
    console.log(this);
    if(this.readyState==4 && this.status==200){
        div.innerHTML=this.response;
    }
}

function send(){
    xhr.open("GET","/misc/text.txt",true);
    xhr.responseType="text";
    xhr.send();
}