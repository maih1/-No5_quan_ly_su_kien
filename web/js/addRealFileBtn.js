var realFileBtn = document.getElementById("real-file");
var customBtn = document.getElementById("custom-button");
var customTxt = document.getElementById("custom-text");
var preview = document.getElementById("avatar-preview");

if(customBtn) {
    customBtn.addEventListener("click", function() {
    realFileBtn.click();
    });
}

if(realFileBtn) {
    realFileBtn.addEventListener("change", function() {
    if (realFileBtn.value) {
        customTxt.value = realFileBtn.files[0].name;
        preview.src = URL.createObjectURL(realFileBtn.files[0]);
    } else {
        customTxt.innerHTML = "No file chosen, yet.";
    }
    });
}
