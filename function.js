function dismiss(){
    var x = document.getElementById("hide");
    if(x.style.display == 'block'){
        x.style.display='none';
        var container=document.getElementsByClassName('container');
        //container.style.width='100%';
    }
    else{
         x.style.display='block'
    }
}
