window.onload = function(){
    document.getElementById("addNewCategory").addEventListener("click", showNewCategoryForm);
    document.getElementById("closeNewCategoryForm").addEventListener("click", closeNewCategoryForm);
}

function showNewCategoryForm(){
    document.getElementById("newCategoryForm").style.transform = "translate(0, 0)";
}

function closeNewCategoryForm(){
    document.getElementById("newCategoryForm").style.transform = "translate(-3000px, 0)";
}