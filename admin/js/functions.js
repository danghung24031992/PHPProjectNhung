function focusInput(id){
    if(id.value==id.title)
        id.value="";
      
}
function blurInput(id){
    if(id.value=="")
        id.value=id.title;
}
function hienthiForm(show){
    document.getElementById(show).style.display="block";
    document.getElementById(hide).style.display="none";
}