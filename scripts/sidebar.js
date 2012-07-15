window.addEventListener("load", function(){
document.querySelector(".sidebar").addEventListener("click", function(e){
    if(e.target.parentNode.parentNode == this){
        toggleClass(e.target.parentNode, "active");
    }
}, false);
},false);