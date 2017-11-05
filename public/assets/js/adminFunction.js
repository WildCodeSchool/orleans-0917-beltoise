$(document).ready(function () {

    // custom "browse..." button and field
    document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("uploadFile").value = this.value.split('\\').pop();
    };
});