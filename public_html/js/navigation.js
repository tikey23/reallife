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
	this.setBlurSection('blurSection');
}

function closeNewCategoryForm(){
    document.getElementById("newCategoryForm").style.transform = "translate(-3000px, 0)";
	this.unsetBlurSection('blurSection');
}

function openNewMemberForm(){
	let open = document.getElementById("idshowNewMemberForm");
	open.style.transform = "translate(0, 0)";
	this.setBlurSection('blurSection');
}

function closeNewMemberForm(){
	let close = document.getElementById("idshowNewMemberForm");
	close.style.transform = "translate(-3000px, 0)";
	this.unsetBlurSection('blurSection');
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
	this.setBlurSection('blurSection');
}

function closeNewCandidateForm(){
	let close = document.getElementById("idNewCandidateForm");
	close.style.transform = "translate(-3000px, 0)";
	this.unsetBlurSection('blurSection');
}

function openUserPassword(){
	let open = document.getElementById("idUserPassword");
	open.style.transform = "translate(0, 0)";
	this.setBlurSection('idUser');

	let closeOthers = document.getElementById("idUserContactInfo");
	closeOthers.style.transform = "translate(-3000px, 0)";
}

function closeUserPassword(){
	let close = document.getElementById("idUserPassword");
	close.style.transform = "translate(-3000px, 0)";
	this.unsetBlurSection('idUser');
}

function checkFormNewMember() {
	let memberfunction = document.getElementById("inputNewMemberFunction").value;
	let memberpwd = document.getElementById("inputMemberPwd").value;
	let memberpwdrepeat = document.getElementById("inputMemberPwdRepeat").value;
	let okSubmit = 0;

	if(memberfunction == 0){
		alert("Bitte Funktion auswählen.");
		okSubmit++;
	}

	if(memberpwd != memberpwdrepeat) {
		alert("Passwörter sind nicht gleich!");
		okSubmit++;
	}

	if(okSubmit == 0){
		document.inputNewMember.submit();
	}
}

function checkFormMemberNewPwd() {
	let membernewpwd = document.getElementById("inputMemberNewPwd").value;
	let membernewpwdrepeat = document.getElementById("inputMemberNewPwdRepeat").value;

	if(membernewpwd != membernewpwdrepeat) {
		alert("Passwörter sind nicht gleich!");
	} else {
		document.inputModifyPassword.submit();
	}
}

function openUserContactInfo(){
	let open = document.getElementById("idUserContactInfo");
	open.style.transform = "translate(0, 0)";
	this.setBlurSection('idUser');

	let closeOthers = document.getElementById("idUserPassword");
	closeOthers.style.transform = "translate(-3000px, 0)";
}

function closeUserContactInfo(){
	let close = document.getElementById("idUserContactInfo");
	close.style.transform = "translate(-3000px, 0)";
	this.unsetBlurSection('idUser');
}

function setBlurSection(id){
	let body = document.getElementById(id);
		body.style.filter = "blur(4px)";
}

function unsetBlurSection(id){
	let body = document.getElementById(id);
		body.style.filter = "blur(0)";
}