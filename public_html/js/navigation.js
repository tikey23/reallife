window.onload = function(){
    // document.getElementById("hamburger").addEventListener("click", openNavi);
    // document.getElementById("naviClose").addEventListener("click", closeNavi);
}

function openNavi(){
    let navi = document.getElementById("navigation");
    navi.style.display = "block";
    document.getElementById("main").style.opacity = 0.3;
    
}

function closeNavi(){
    let navi = document.getElementById("navigation");
    navi.style.display = "none";
    document.getElementById("main").style.opacity = 1;
}

