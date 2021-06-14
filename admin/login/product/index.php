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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="../architectui/main.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Belgindo | Admin Page</title>
    <link rel="icon" type="image/png" href="../../Images/icons/logoicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css"/>

    <!-- ini buat crop gambar -->
    <link rel="stylesheet" href="/assets/CSS/normalize.css">
    <link rel="stylesheet" href="/assets/CSS/component.css">
    <link rel="stylesheet" href="/assets/CSS/croppie.css">
    <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/themes/black-tie/jquery-ui.css">
    
    <!-- ini buat crop gambar -->
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="../architectui/assets/scripts/main.js"></script>
    <script src="https://kit.fontawesome.com/158176bbc5.js" crossorigin="anonymous"></script>
    
    <!-- ini buat crop gambar -->
    <script src="/assets/Script/jquery.custom-file-input.js"></script>
    <script src="/assets/Script/croppie.js"></script>
    <script src="/assets/Script/exif.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/jquery-ui.min.js"></script>

    <!-- croppie -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"> </script>


</head>
<style>

    .rwd-table {
        margin: 1em 0;
        min-width: 300px;
    }



    .rwd-table th {
        display: none;
        background-color: #D1BE7A;
    }

    .rwd-table td {
        display: block;
    }

    .rwd-table td:first-child {
        padding-top: .5em;
    }

    .rwd-table td:last-child {
        padding-bottom: .5em;
    }

    .rwd-table td:before {
        content: attr(data-th) ": ";
        font-weight: bold;
        width: 6.5em;
        display: inline-block;
    }

    @media (min-width: 480px) {
        .rwd-table td:before {
            display: none;
        }
    }

    .rwd-table th,
    .rwd-table td {
        text-align: left;
    }

    @media (min-width: 480px) {

        .rwd-table th,
        .rwd-table td {
            display: table-cell;
            padding: .25em .5em;
        }

        .rwd-table th:first-child,
        .rwd-table td:first-child {
            padding-left: 0;
        }

        .rwd-table th:last-child,
        .rwd-table td:last-child {
            padding-right: 0;
        }
    }

    .rwd-table {
        color: black;
        border-radius: .4em;
        overflow: hidden;
    }

    .rwd-table th,
    .rwd-table td {
        margin: .5em 1em;
    }

    @media (min-width: 480px) {

        .rwd-table th,
        .rwd-table td {
            padding: 1em !important;
        }
    }

    .rwd-table th,
    .rwd-table td:before {
        color: black;
    }

    @keyframes type-green {

        1%,
        100% {
            border-color: #D1BE7A !important;
        }

        50% {
            border-color: #D1BE7A !important;
        }
    }

    .jconfirm .jconfirm-box.jconfirm-type-green {
        border-color: #D1BE7A !important;
    }

    .jconfirm .jconfirm-box .jconfirm-buttons button.btn-green {
        background-color: #D1BE7A !important;
    }
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
    .modal2 {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1000;
        /* Sit on top */
        /* padding-top: 100px; */
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
        justify-content: center;
    }

    /* Modal Content (image) */
    .modal-content2 {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 400px;
        height: auto;
    }

    /* Caption of Modal Image */
    #caption2 {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content2,
    #caption2 {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }
    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close2 {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close2:hover,
    .close2:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content2 {
            width: 100%;
        }
    }

    .bg-light {

        transition: ease-in 0.5s !important;

    }

    .bg-light-lg {

        transition: ease-in 0.5s !important;

    }

    .navbar-toggler {

        font-size: 1.75rem !important;

    }

    .bar-light {

        transition: ease-in 0.5s !important;

    }

    .font-lg li a {

        font-size: 30px !important;

    }

    .acxs {
        font-family: "Font Awesome 5 Free" !important;
        color: white !important;
    }

    @media only screen and (max-width: 991px) {
        #content {
            width: 100vw !important;
            min-width: 100vw !important;
            max-width: 100vw !important;
            margin-top: 5rem !important;
        }

        #content.active {
            width: 100vw !important;
            min-width: 100vw !important;
            max-width: 100vw !important;
        }

        .container {
            width: 100vw !important;
            max-width: 100vw !important;
        }

    }
</style>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow  header-text-dark" style="background-color:#f16739">
            <?php include '../assets/addon/header.php'; ?>
        </div>
          <div class="ui-theme-settings">
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                </div>
            </div>
        </div>
        <div class="app-main ">
            <div class="app-sidebar sidebar-shadow sidebar-text-light" style="background-color:#D1BE7A">
            <?php include '../assets/addon/sidebar.php'; ?>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <h1>Product</h1>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row pt-4">
                            <div class="text-right">
                                <button id="add-blog-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-product-modal"><i class="lnr lnr-plus-circle"></i>Add Product</button>
                            </div>
                        </div>
                        <div class="row pt-4 ">
                            <div class="col-12" id="list-product">
                                <?php
                                    echo show_product($pdo);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH PRODUCT -->
    <div class="modal fade" id="add-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#D1BE7A; color:white;">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="color:black;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data" id="add-product-form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Category : </label>
                            <select class="form-control border-dark" id="kategori" name="kategori" style="background-color: transparent !important;color:black;">
                                <option hidden value="-1">Category</option>
                                <option value="1">Matte Black</option>
                                <option value="2">Foil</option>
                                <option value="3">Gold & Silver</option>
                                <option value="4">Highloss</option>
                                <option value="5">Matte White</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputGambar">Image</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload File</span>
                                </div>
                                <div class="custom-file box">
                                    <input type="file" name="gambarproduct" id="gambarproduct" onchange="readImage(this);" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg" />
                                    <label class="custom-file-label" for="gambarproduct">Choose File</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Product Name : </label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Input Title">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Description : </label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="deskripsi" rows="4" required="required" data-error="Its Empty!"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="submit-add-button" name="submit" class="btn btn-success"><i class="lnr lnr-plus-circle"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT PRODUCT -->
    <div class="modal fade" id="edit-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#D1BE7A; color:white;">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="color:black;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data" id="add-product-form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Category : </label>
                            <select class="form-control border-dark" id="kategori" name="kategori" style="background-color: transparent !important;color:black;">
                                <option hidden value="-1">Category</option>
                                <option value="1">Matte Black</option>
                                <option value="2">Foil</option>
                                <option value="3">Gold & Silver</option>
                                <option value="4">Highloss</option>
                                <option value="5">Matte White</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputGambar">Image</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload File</span>
                                </div>
                                <div class="custom-file box">
                                    <input type="file" name="gambarproduct" id="gambarproduct" onchange="readImage(this);" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg" />
                                    <label class="custom-file-label" for="gambarproduct">Choose File</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Product Name : </label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Input Title">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Description : </label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="deskripsi" rows="4" required="required" data-error="Its Empty!"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="submit-add-button" name="submit" class="btn btn-success"><i class="lnr lnr-plus-circle"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- MODAL EDIT BLOG -->
    <!-- ini buat crop gambar-->
    <div id="cropModal">
        <div class="row align-items-center justify-content-center">
            <div class="col-12">
                <img src="" class="crop">
            </div>
        </div>
    </div>
    <!-- ini buat crop gambar-->

    <!-- Modal Preview Image -->
    <div id="modalImage" class="modal2">
        <span class="close2">&times;</span>
        <img class="modal-content2" id="img01">
        <div id="caption2"></div>
    </div>

    <script>
        var uploadCrop;
        var productblobdata = null;

        function imageExists(image_url) {
            var http = new XMLHttpRequest();
            http.open('HEAD', image_url, false);
            http.send();
            return http.status != 404;
        }

        function readImage(input) {
            $(input).next('.custom-file-label').html("Choose File");
            var fileName = $(input).val();
            fileName = fileName.substring(12);
            if (input.files && input.files[0]) {
                var iddb = $(input).data('id');
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.crop').attr('src', e.target.result);
                    uploadCrop = $('.crop').croppie({
                        enableExif: true,
                        viewport: {
                            width: 300,
                            height: 420,
                            type: 'square'
                        },
                        boundary: {
                            width: 300,
                            height: 420
                        },
                        enforceBoundary: true,
                        mouseWheelZoom: true,
                        showZoomer: false,
                        enableZoom: true
                    });
                    $('#cropModal').dialog({
                        buttons: [{
                            text: "Crop",
                            click: function() {
                                uploadCrop.croppie('result', {
                                    type: 'blob',
                                    size: 'viewport',
                                    format: 'png',
                                    quality: '1',
                                    circle: 'false'
                                }).then(function(blob) {
                                    const url = URL.createObjectURL(blob);
                                    productblobdata = blob;
                                    $(input).next('.custom-file-label').html(fileName);
                                });
                                $(this).dialog("close");
                            },
                            class: "btn btn-info"
                        }],
                        position: {
                            my: "center",
                            at: "center",
                            of: "body"
                        },
                        minHeight: 600,
                        minWidth: 600
                    });
                    $('.ui-dialog').css('z-index', '1051');
                    $(".ui-dialog-titlebar-close").css('border', 'none');
                    $(".ui-dialog-titlebar-close").append('<i class="fas fa-times"></i>');
                };
                reader.readAsDataURL(input.files[0]);
            }
            input.value = null;
        }

        // AJAX
        $(document).on('click', '#submit-add-button', function(e) {
            e.preventDefault();
            $.confirm({
                title: 'Are you sure?',
                content: 'Your data will be changed',
                buttons: {
                    confirm: {
                        text: 'Confirm',
                        btnClass: 'btn-success',
                        keys: ['enter', 'shift'],
                        action: function() {
                            var Formhtml = document.getElementById("add-product-form");
                            var Formobj = new FormData(Formhtml);
                            if (!productblobdata) {
                                $.alert({
                                    title: 'Image Empty!',
                                    content: 'Please make sure all the images are selected!',
                                });
                                return;
                            }
                            Formobj.append("image", productblobdata, "image");
                            $.ajax({
                                type: "POST",
                                url: "services/add_product.php",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: Formobj,
                                success: function(data) {
                                    $("#list-product").html(data);
                                    addModal.hide();
                                    $('#add-product-form')[0].reset();
                                    productblobdata = null;
                                    $('#gambarproduct').next('.custom-file-label').html("Choose File");
                                },
                                error: function(xhr) {
                                    addModal.hide();
                                    $.confirm({
                                        title: 'Encountered an error!',
                                        content: 'Something went wrong while changing the data </br> Error: "' + xhr.responseJSON.msg + '"',
                                        type: 'red',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Try again',
                                                btnClass: 'btn-red',
                                                action: function() {
                                                    $('#add-product-form')[0].reset();
                                                }
                                            },
                                            close: function() {
                                                $('#add-product-form')[0].reset();
                                            }
                                        }
                                    });
                                    productblobdata = null;
                                }
                            });
                        }
                    },
                    cancel: {
                        text: 'Cancel',
                        btnClass: 'btn-secondary',
                        keys: ['enter', 'shift'],
                        action: function() {}
                    }
                }
            });
        });

        $(document).on("click", "[id='preview-image']", function() {
            var imgsrc = $(this).data('src');
            $('#modalImage').css('display', 'block');
            $('#img01').attr('src', '/belgindo1/ourwork/product/' + imgsrc);
        });

        $(document).on('click', '.close2', function() {
            $('#modalImage').css('display', 'none');
        });
    </script>
</body>


</html>