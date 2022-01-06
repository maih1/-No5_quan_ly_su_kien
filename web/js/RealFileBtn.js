var realFileBtn = document.getElementById("real-file");
var customBtn = document.getElementById("custom-button");
var customTxt = document.getElementById("custom-text");

if(customBtn) {
    customBtn.addEventListener("click", function() {
    realFileBtn.click();
    });
}

if(realFileBtn) {
    realFileBtn.addEventListener("change", function() {
    if (realFileBtn.value) {
        customTxt.value = realFileBtn.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } 
    });
}