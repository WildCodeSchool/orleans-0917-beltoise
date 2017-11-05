$(document).ready(function () {

    // custom "browse..." button and field
    document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("uploadFile").value = this.value.split('\\').pop();
    };

    // custom "browse..." button and field for renov imageAfter
    document.getElementById("imageAfter").onchange = function () {
        document.getElementById("uploadFileImageAfter").value = this.value.split('\\').pop();
    };
});