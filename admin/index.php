<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/backend_service/database.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/admin/services/functions.php";
session_start();
if (isset($_SESSION['username'])) {
    insert_logout($pdo, $_SESSION['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</head>
<style>
    body {
        /* background: url("Images/Background.jpg") no-repeat center center fixed; */
        background-color: #F9F0D7 !important;
        overflow-x: hidden !important;
        background-size: 100%;

    }

    h1 {
        color: black;
        -webkit-text-fill-color: white;
        /* Will override color (regardless of order) */
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: grey;
        text-shadow: 2px 2px black;
    }

    #login:hover {
        background-color: #B7A56C !important;
        color: #F9F0D7 !important;
        border: 1px solid black !important;
        border-width: 1px !important;
        border-color: #F9F0D7 !important;
        border-radius: 5px !important;
    }

    @media screen and (max-width: 890.5px) {
        .btn-txt {
            font-size: 15px !important;
        }

        .title {
            font-size: 40px !important;
        }
    }

    @media screen and (max-width: 715px) {
        #mainImg {
            height: 40vh !important;
            width: auto !important;
        }
    }

    @media screen and (max-width: 578px) {
        #mainImg {
            height: 35vh !important;
            width: auto !important;
        }

        body {
            -webkit-background-size: cover !important;
            -moz-background-size: cover !important;
            -o-background-size: cover !important;
            background-size: cover !important;
            overflow-x: hidden !important;
            background-color: #F9F0D7;
        }
    }

    @media screen and (max-width: 520px) {
        #mainImg {
            height: 30vh !important;
            width: auto !important;
        }
    }

    @media screen and (max-width: 450px) {
        #mainImg {
            height: 25vh !important;
            width: auto !important;
        }
    }

    @media screen and (max-width: 460.5px) {
        .btn-txt {
            font-size: 10px !important;
        }

        .title {
            font-size: 30px !important;
        }
    }

    @media screen and (max-width: 400px) {
        #mainImg {
            height: 20vh !important;
            width: auto !important;
        }
    }

    @media screen and (max-width: 320.5px) {
        .btn-txt {
            font-size: 10px !important;
        }

        .title {
            font-size: 20px !important;
        }
    }

    @keyframes type-green {

        1%,
        100% {
            border-color: #B7A56C !important;
        }

        50% {
            border-color: #B7A56C !important;
        }
    }

    .jconfirm .jconfirm-box.jconfirm-type-green {
        border-color: #B7A56C !important;
    }

    .jconfirm .jconfirm-box .jconfirm-buttons button.btn-green {
        background-color: #B7A56C !important;
    }
</style>
<body>
    <div style="min-height: 100vh;">
        <div class="p-4 p-md-1" style="padding-top: 15%!important;">
            <div class="card mb-3 mx-auto p-3 mt-5 mt-md-3" style="max-width: 540px; background-color:#D1BE7A; border-radius:10px;border:1px solid black; border-width:1px ;border-color:#B7A56C;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="row pb-2"></div>
                        <div class="row pl-3">
                            <div class="col">
                                <img src="Images/logo.png" class="card-img">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title" style="color:white">Login</h5>
                            <div class="card-text">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" required="">
                                </div>

                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="">
                                </div>

                                <button type="submit" class="btn float-right" name="login" id="login" style="background-color:#F9F0D7; color:#B7A56C; border:1px solid black; border-width:1px ;border-color:#B7A56C;; border-radius:5px;">Sign In</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

<script>
    var loginSucceed = false;
    var loginFail = false;
    var redirecturl = "/belgindo1/admin/";

    function login(username, password) {
        var jc = $.dialog({
            title: '',
            content: '',
            closeIcon: false,
            onOpenBefore: function () {
                this.showLoading(true);
            }
        });
        setTimeout(function () {
            $.ajax({
                url: 'services/login.php',
                method: 'POST',
                data: {
                    username: username,
                    password: password
                },
                async: false,
                beforeSend: function () {
                    jc.showLoading(true);
                },
                complete: function () {
                    jc.close();
                },
                success: function (data) {
                    loginSucceed = true;
                    data = JSON.parse(data);
                    console.log(data);
                    redirecturl = data.redirect;
                    $.confirm({
                        title: 'Succcess!',
                        content: 'Redirecting...',
                        type: 'green',
                        typeAnimated: true,
                        buttons: {
                            OK: {
                                text: 'OK',
                                btnClass: 'btn-green',
                                action: function () {
                                    loginSucceed = false;
                                    window.location = data.redirect;
                                }
                            },
                            close: function () {
                                loginSucceed = false;
                                window.location = data.redirect;
                            }
                        }
                    });
                },
                error: function ($xhr, textStatus, errorThrown) {
                    loginFail = true;
                    $.confirm({
                        title: 'Encountered an error!',
                        content: 'Something went wrong while login </br> Error: "' + $xhr.responseJSON['error'] + '"',
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            tryAgain: {
                                text: 'Try again',
                                btnClass: 'btn-red',
                                action: function () {
                                    loginFail = false;
                                    $("#username").val("");
                                    $("#password").val("");
                                }
                            },
                            close: function () {
                                loginFail = false;
                                $("#username").val("");
                                $("#password").val("");
                            }
                        }
                    });

                }
            });
        }, 1000);
    }
    $(document).on('keypress', function (e) {
        if (e.which == 13 && loginSucceed == false && loginFail == false) {
            var username = $("#username").val();
            var password = $("#password").val();
            login(username, password);
        } else if (e.which == 13 && loginSucceed == true) {
            window.location = redirecturl;
        }
    });
    $(document).on('click', '#login', function () {
        var username = $("#username").val();
        var password = $("#password").val();
        login(username, password);
    });
</script>
</html>