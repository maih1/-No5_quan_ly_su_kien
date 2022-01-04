var realFileBtn = document.getElementById("file");
var customBtn = document.getElementById("uploadTrigger");
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
<<<<<<< HEAD:web/js/addRealFileBtn_comment.js
        customTxt.value = realFileBtn.files[0].name;
        preview.src = URL.createObjectURL(realFileBtn.files[0]);
    } else {
        customTxt.innerHTML = "No file chosen, yet.";
    }
=======
        customTxt.value = realFileBtn.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } 
>>>>>>> test_2:web/js/EventAddRealFileBtn.js
    });
}
