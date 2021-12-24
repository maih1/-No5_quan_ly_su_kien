var realFileBtn = document.getElementById("real-file");
var customBtn = document.getElementById("custom-button");
var customTxt = document.getElementById("custom-text");

if(customBtn) {
    customBtn.addEventListener("click", function() {
    realFileBtn.click();
    });
}
// customTxt.value = php_var;
if(realFileBtn) {
    realFileBtn.addEventListener("change", function() {
    if (realFileBtn.value) {
        // customTxt.innerHTML = realFileBtn.value.match(
        //   /[\/\\]([\w\d\s\.\-\(\)]+)$/
        // )[1];
        customTxt.value = realFileBtn.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } 
    });
}