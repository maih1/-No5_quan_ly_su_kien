function getFileData(myFile) {
    var file = myFile.files[0];
    var filename = file.name;
    document.getElementById("fileNameTextBox").innerHTML = filename;
}