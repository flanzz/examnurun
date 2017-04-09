$(document).ready(function () {
    $('.form-reg').attr("top","0px");
    $("#btn-reg").click(function(){
        $('.form-reg').load('view/popups.html');
        $('.form-reg').bPopup({
            follow: [false, false], //x, y
             fadeSpeed: 'slow', //can be a string ('slow'/'fast') or int
            followSpeed: 1000, //can be a string ('slow'/'fast') or int
            modalColor: '#8c8c8c'
        });
    });
     $("#btnupload").click(function(){
        $('.form-up').load('view/upload.html');
        $('.form-up').bPopup({
            follow: [false, false], //x, y
             fadeSpeed: 'slow', //can be a string ('slow'/'fast') or int
            followSpeed: 1000, //can be a string ('slow'/'fast') or int
            modalColor: '#8c8c8c'
        });
    });
    
});