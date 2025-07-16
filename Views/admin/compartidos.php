<?php include_once 'Views/template/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css//bootstrap.css">
    <link rel="stylesheet" href="Assets/css/mailbox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <title>MailBox</title>
</head>

<body>
    <div class="parent">
        <div class="top-nav d-flex justify-content-between">
        </div>
        <div class="app">

            <div class="app-container">
                <div class="folders-bar">
                    <div class="p-1 folders d-sm-none d-md-block">
                        <!-- All Messages-->
                        <div class="folder-name active">Todos los mensajes</div>
                        <div class="folder-item active row">
                            <div class="col-md-2">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                            <div class="col-md-7">Recientes</div>
                            <div class="col-md-3 d-flex justify-content-end">
                                <!--span class="badge-custom"-->
                            </div>
                        </div>
                        <div class="folder-item row">
                            <div class="col-md-2">
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="col-md-7">Favoritos</div>
                            <div class="col-md-3 d-flex justify-content-end">
                                <!--span class="badge-custom"-->
                            </div>
                        </div>
                        <div class="folder-item row justify-contant-center">
                            <div class="col-md-2">
                                <i class="fa-solid fa-message"></i>
                            </div>
                            <div class="col-md-7">Todos los mensajes</div>
                            <div class="col-md-3 d-flex justify-content-end">
                               <!--span class="badge-custom"-->
                            </div>
                        </div>
                       
                        <div class="folder-name">Referidos</div>
                        
                        <div class="folder-item row">
                            <div class="col-md-2">
                                <i class="fa-regular fa-user"></i>
                            </div>
                            <div class="col-md-7">usuarios</div>
                            <div class="col-md-3 d-flex justify-content-end">
                               <!--span class="badge-custom"-->
                            </div>
                        </div>
                        
                        
                    </div>
                    <!--panel de la derecha-->
                    <div class="main" style="width: 100%;">
                        <div class="row">
                            <div class="col-md-10 title d-flex align-items-center">
                                Mensajes Compartidos
                            </div>
                            <div class="col-md-2 d-flex justify-content-end">
                                <div class="email-btn">
                                    <i class="fa-regular fa-envelope"></i>
                                    <span>Nuevo Mensaje</span>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <!--Row 2-->
                        <div class="row p-1">
                            <div class="col-md-5">

                                <div class="col-md-3"></div>

                            </div>
                            <!--Row 3-->
                            <div class="split-reader d-flex" style="width: 100%;">
                                <!-- Lado izquierdo: lista de correos -->
                                <div id="emails" class="flex-shrink-1">
                                    <?php foreach ($data['archivos'] as $archivo) { ?>
                                        <div class="email" data-id="<?php echo $archivo['id']; ?>">
                                            <div><i class="fa-solid fa-ellipsis-vertical"></i></div>
                                            <div><input type="checkbox"></div>
                                            <div><i class="fa-regular fa-star"></i></div>
                                            <div class="user-img"><i class="fa-solid fa-circle-user"></i></div>
                                            <div class="preview">
                                                <div class="subject"><?php echo ($archivo['username']); ?></div>
                                                <div class="message"><?php echo ($archivo['archivo']); ?></div>
                                            </div>
                                            <div class="timestamp"></div>
                                        </div>
                                    <?php } ?>
                                </div>

                                <!-- Lado derecho: detalle del email -->
                                <div id="content-info" name="content-info" class="p-1 position-relative d-none d-md-block"> 
                                    
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include_once 'Views/template/footer.php'; ?>