
window.onload = function(){
	// document.getElementById("hamburger").addEventListener("click", openNavi);
	// document.getElementById("naviClose").addEventListener("click", closeNavi);
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


function updateMemberStatus(element, memberid) {
	var value = element.innerHTML.trim();
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4 && xhr.status === 200) {
			if(xhr.responseText == 1) {
				element.innerHTML = "Ja";
				element.closest('tr').classList.remove('opacity-40');
			} else {
				element.innerHTML = "Nein";
				element.closest('tr').classList.add('opacity-40');
			}
		}
	};
	xhr.open('POST', '/api.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send('action=updateMemberStatus&status=' + value + '&id=' + memberid);
}