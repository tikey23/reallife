
window.onload = function(){
	document.getElementById("hamburger").addEventListener("click", openNavi);
	document.getElementById("naviClose").addEventListener("click", closeNavi);
    document.getElementById("idNewMemberButton").addEventListener("click", function(){openNewMemberForm()});
    document.getElementById("closeNewMember").addEventListener("click", function(){closeNewMemberForm()});
}

function openNewMemberForm(){
	let open = document.getElementById("idshowNewMemberForm");
	open.style.transform = "translate(0, 0)";
}

function closeNewMemberForm(){
	let close = document.getElementById("idshowNewMemberForm");
	close.style.transform = "translate(-3000px, 0)";
}

function openNavi(){
    let navi = document.getElementById("navigation");
    navi.style.display = "block";
}

function closeNavi(){
    let navi = document.getElementById("navigation");
    navi.style.display = "none";
}

