<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiCI Chongoene</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
    <style>
        .login-logo img {
            width: 100px;
            text-align: center;
            border-radius: 5px;
        }

        .login-box {
            background-color: white;
            padding: 10px;
            border-radius: 15px;
            box-shadow: 1px 1px 10px #000;
        }

        .card {
            border-radius: 15px
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-image: url(assets/img/login-page-bg4.webp);
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo" style="height: 250px;">
            <img src="assets/img/logochongo.PNG" class="img-responsive" id="logo" alt="responsive image"
                style="width:230px;">
            <h3> <a href="">SiCI Chongoene</a></h3>
        </div>

        <div class="card">
            <div class="card-body login-card-body" style="border-radius: 20px;">
                <p class="login-box-msg">Digite Seus Dados de Autenticacão</p>
                <div id="ERRO" style="color: red; text-align: center; margin-bottom: 10px;">
                    <?php
                    if (isset($_SESSION['erro'])) {
                        echo $_SESSION['erro'];
                        unset($_SESSION['erro']);
                    }
                    ?>
                    <br>
                </div>

                <form action="login.php" method="POST">
    <div class="input-group mb-3">
        <input type="email" name="username" class="form-control" placeholder="Email"
            style="border-radius: 50px;" required>
        <div class="input-group-append">
            <div class="input-group-text"
                style="border-radius: 50px; background-color: lightblue; color:#fff;">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" name="senha" class="form-control" placeholder="Password"
            style="border-radius: 50px;" required>
        <div class="input-group-append">
            <div class="input-group-text"
                style="border-radius: 50px;background-color: lightblue; color:#fff; width: 40px;">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
</form>
       </div>
   </form>
 </div>
 </div>
</div>

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/adminlte.min.js"></script>
</body>

</html>
