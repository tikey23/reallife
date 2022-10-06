
window.onload = function(){
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
