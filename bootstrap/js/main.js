var username = "";
$(document).ready(function () {
    $(".gridcontainer").load("view/grid.html");
    $.post('controlador/sesion.php', function (data) {
        if (data != "none" && data != "") {
            var params = data.split('-');
            if (params[0] != undefined) {
                console.log(params);
                //submitForm();
                username = params[0];
                submitForm("correo=" + params[2] + "&pass=" + params[1]);
            }
        }
    });
    $("#btn-login").off("click").on("click", function () {
        var c = $("#txtCorreo").val();
        var p = $("#txtPass").val();
        if (c != "" && p != "") {
            submitForm();
        }
    });

    function submitForm(params) {
        var data = "";
        if (params != null && params != "" && params != undefined) {
            data = params;
        }
        else {
            data = $("#login").serialize();
        }
        $.ajax({
            type: 'POST'
            , url: 'controlador/login.php'
            , data: data
            , beforeSend: function () {
                $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Enviando...');
            }
            , success: function (response) {
                if (response == "ok") {
                    console.log(response);
                    $("#btn-login").html('<img src="img/ajax-loader.gif" /> &nbsp;  Iniciando sesion...');
                    $(".container h1").empty().append("Bienvenido " + username + " a Mundo GIF");
                    $(".navbar-form ").empty();
                    $("#dropdownbtn").show();
                    checkStatus();
                }
                else {
                    console.log(response);
                    $("#btn-login").html('Iniciar Sesion');
                }
            }
            , error: function (ex) {
                console.log(ex);
            }
        }).done(function (json) {});
        return false;
    }

    function checkStatus() {
        $.ajax({
            type: 'POST'
            , url: 'controlador/checkstatus.php'
            , success: function (response) {
                if (response.indexOf("ok") > 0) {
                    response = response.replace("ok", "");
                    var data = response.split(";");
                    for (var i = 0; i < data.length; i++) {
                        var datos = data[i].split("?");
                        if (datos[1] != 1) {
                            datos[0] = datos[0].replace("../", "");
                            $("body").find("img").each(function () {
                                var src = this.src;
                                src = src.replace("http://examnurun.hol.es/", "");
                                if (src == datos[0]) {
                                    var fig = this.parentNode;
                                    if (fig.localName == "figure") {
                                        var li = fig.parentNode;
                                        //li.style.display = "none";
                                        $(li).remove();
                                    }
                                    else {
                                        //this.style.display = "none"; 
                                        $(this).remove();
                                    }
                                }
                            });
                        }
                        else {
                            
                            $('<input class="chStatus" type="checkbox" checked  >').appendTo("div#accepted").click(function () {
                                if (!$(this).is(':checked')) {
                                    var fdiv = $(this).parent();
                                    var sdiv = $(fdiv).parent();
                                    var tdiv = $(sdiv).parent();
                                    var li = $(tdiv).parent();
                                    
                                    var img = $(tdiv).children("img");
                                    var imgSRC = $(img).prop("src");
                                    imgSRC = imgSRC.replace("http://examnurun.hol.es/", "");
                                    imgSRC = "ruta=../"+imgSRC;
                                    $.ajax({
                                        type: 'POST'
                                        , url: 'controlador/updateCheck.php'
                                        ,data:imgSRC
                                        , success: function (response){
                                            if(response == "ok"){
                                                $(li).hide();
                                            }
                                        }
                                    });
                                }
                            });
                            break;
                        }
                    }
                }
                else {
                    console.log(response);
                    $("#btn-login").html('Iniciar Sesion');
                }
            }
            , error: function (ex) {
                console.log(ex);
            }
        })
    }
    $("#btView").off("click").on("click", function () {
        if (this.innerHTML == "Grid") {
            this.innerHTML = "SlideShow";
        }
        else {
            this.innerHTML = "Grid";
        }
        $(".carrousel").toggle('slow');
    });
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=109144166300891";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
});