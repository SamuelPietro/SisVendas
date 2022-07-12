<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="title" content="<?php echo APP_NAME; ?>">
    <meta name="description" content="<?php echo APP_DESC; ?>">
    <meta name="keywords" content="<?php echo APP_KEYS; ?>">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Portuguese">
    <meta name="revisit-after" content="7 days">
    <meta name="author" content="<?php echo APP_AUTHOR; ?>">
    <link rel="shortcut icon" href="<?php echo URL; ?>images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo URL; ?>images/webclip.ico">
    
    <title><?php echo APP_NAME; ?></title>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="application/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="application/javascript" src="<?php echo URL; ?>js/js.js"></script>

    <style>
        a:link {
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        a:active {
            text-decoration: none;
        }


    </style>
</head>

<body>
<header>
    <div class="px-3 py-2 bg-Light border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="<?php echo URL; ?>" class="d-flex align-items-center
          my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <img class="bi me-2" width="auto" height="45" role="img"
                         aria-label="<?php echo APP_NAME; ?>" alt="<?php echo APP_NAME; ?>" src="<?php echo URL; ?>images/logomarca.png" />
                </a>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center text-center my-md-0 text-small">
                    <li>
                        <a href="<?php echo URL; ?>" class="nav-link text-light">
                            <i class="fa-solid fa-house bi d-block mx-auto mb-1" style="font-size:35px;color:#F03E5D;"></i>
                            <span style="vertical-align: inherit;color:#F03E5D;">
                                Home
                            </span></a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>clientes" class="nav-link text-light">
                            <i class="fa-solid fa-user-group bi d-block mx-auto mb-1" style="font-size:35px;color:#F03E5D;"></i>
                            <span style="vertical-align: inherit;color:#F03E5D;">
                                Clientes
                            </span></a>
                    </li>

                    <li>
                        <a href="<?php echo URL; ?>servicos" class="nav-link text-light">
                            <i class="fa-solid fa-toolbox bi d-block mx-auto mb-1" style="font-size:35px;color:#F03E5D;"></i>
                            <span style="vertical-align: inherit;color:#F03E5D;">
                                Serviços
                            </span></a>
                    </li>

                    <li>
                        <a href="<?php echo URL; ?>vendas" class="nav-link text-light">
                            <i class="fa-solid fa-wallet bi d-block mx-auto mb-1" style="font-size:35px;color:#F03E5D;"></i>
                            <span style="vertical-align: inherit;color:#F03E5D;">
                                Vendas
                            </span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>