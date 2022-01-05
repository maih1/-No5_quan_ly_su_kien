var loadFile = function(user) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(user.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src);
    }
};