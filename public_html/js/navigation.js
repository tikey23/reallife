window.onload = function(){
    document.getElementById("openNaviIcon").addEventListener("click", openNavi);
    document.getElementById("closeNaviIcon").addEventListener("click", closeNavi);
}

function openNavi(){
    document.getElementById("navi").style.display = "unset";
    document.getElementById("openNaviIcon").style.display = "none";
    document.getElementById("closeNaviIcon").style.display = "unset";
    document.getElementById("main").style.opacity = 0.3;
    
}

function closeNavi(){
    document.getElementById("navi").style.display = "none";
    document.getElementById("openNaviIcon").style.display = "unset";
    document.getElementById("closeNaviIcon").style.display = "none";
    document.getElementById("main").style.opacity = 1;
}

function showNewCategoryForm(){
    document.getElementById("newCategoryForm").style.transform = "translate(0, 0)";
}

function closeNewCategoryForm(){
    document.getElementById("newCategoryForm").style.transform = "translate(-3000px, 0)";
}

function openNewMemberForm(){
	let open = document.getElementById("idshowNewMemberForm");
	open.style.transform = "translate(0, 0)";
}

function closeNewMemberForm(){
	let close = document.getElementById("idshowNewMemberForm");
	close.style.transform = "translate(-3000px, 0)";
}

function updateMemberStatus(element, memberid) {
	var value = element.innerHTML.trim();
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4 && xhr.status === 200) {
			if(xhr.responseText == 1) {
				element.innerHTML = "Ja";
				document.getElementById(memberid).classList.remove('opacity-40');
			} else {
				element.innerHTML = "Nein";
				document.getElementById(memberid).classList.add('opacity-40');
			}
		}
	};
	xhr.open('POST', '/api.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send('action=updateMemberStatus&status=' + value + '&id=' + memberid);
}

function openNewCandidateForm(){
	let open = document.getElementById("idNewCandidateForm");
	open.style.transform = "translate(0, 0)";
}

function closeNewCandidateForm(){
	let close = document.getElementById("idNewCandidateForm");
	close.style.transform = "translate(-3000px, 0)";
}

/* function checkForm(){
	let check = 0;
	let text = "";
	let memberfunction = document.getElementById("inputNewMemberFunction");
	let memberpassword = document.getElementById("inputNewMemberPassword");
	let memberpasswordrepeat = document.getElementById("inputNewMemberPasswordRepeat");

	if(memberfunction.value = 'Admin'){
		text += "Bitte eine Funktion auswählen\n";
		check++;
	}

	if(memberpassword.value != memberpasswordrepeat.value){
		text += "Passwörter sind nicht gleich.";
		check++;
	}

	if(check != 0){
		alert(text);
	}
} */