
window.onload = function(){
	document.getElementById("hamburger").addEventListener("click", openNavi);
	document.getElementById("naviClose").addEventListener("click", closeNavi);
    document.getElementById("idNewCandidateButton").addEventListener("click", function(){openNewCandidateForm()});
    document.getElementById("closeNewCandidate").addEventListener("click", function(){closeNewCandidateForm()});
}

function openNewCandidateForm(){
	let open = document.getElementById("idNewCandidateForm");
	open.style.transform = "translate(0, 0)";
}

function closeNewCandidateForm(){
	let close = document.getElementById("idNewCandidateForm");
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

