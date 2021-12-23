var loadFile = function(event) {
    var output = document.getElementById('output');
    // console.log(output)
    output.src = URL.createObjectURL(event.target.files[0]);
    console.log(output.src)
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};