$(document).ready(function () {

    // 1st custom "browse..." button and field of a page
    document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("uploadFile").value = this.value.split('\\').pop();
    };

    // 2nd custom "browse..." button and field of a page
    document.getElementById("uploadBtn2").onchange = function () {
        document.getElementById("uploadFile2").value = this.value.split('\\').pop();
    };

    // 3rd custom "browse..." button and field of a page
    document.getElementById("uploadBtn3").onchange = function () {
        document.getElementById("uploadFile3").value = this.value.split('\\').pop();
    };
});