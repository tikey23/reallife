window.onload = function(){
    document.getElementById("hamburger").addEventListener("click", openNavi);
}

function openNavi(){
    let navi = document.getElementById("navigation");
    navi.style.display = "block";
}

