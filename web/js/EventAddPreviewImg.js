var loadFile = function(event) {
    var output = document.getElementById('output');
    // console.log(output)
    // console.log('sd')
    output.src = URL.createObjectURL(event.target.files[0]);
    // console.log(event.target.files[0])
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};