
function bread(elemento){
    var n = $("#meu-breadcrumb li").length; //quantidade de nomes no breadcrumb.
   
    if(n<4){
        var pass;
        pass = "<li class='breadcrumb-item active' aria-current='page'>"+elemento+"</li>";
       localStorage.setItem('bread', pass);
    }
      
}