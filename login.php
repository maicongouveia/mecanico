<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt" class="no-js">
    <head>
    <title>Tico Volare - Login</title>
    
    <!-- Importando BootStrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Mobile First -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Caracteres Especiais -->
        <meta charset="UTF-8"> 

    </head>
    <body>

        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-2 col-md-offset-5 col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4'>
                    <h5 class='text-center'>Tico Volare</h5>
                </div>                          
            </div>
            <form action='index.php' method="POST">
            <div class='row'>
                <div class='col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4'>
                    <?php 
                        if(isset($_SESSION['loginErro'])){
                            echo "<div class='alert alert-danger text-center' style='font-size: 13px;'>".$_SESSION['loginErro']."</div>";
                            unset($_SESSION['loginErro']);
                        } 
                    ?>
                </div>              
            </div>
            <div class='row'>
                <div class='col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4'>
                    <h5 style="font-weight: bold;">Email</h5>
                </div>              
            </div>
            <div class='row'>       
                <div class='col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4'>
                    <input type="text" name="email" class="form-control" style='border: 0px; border-bottom: 1px solid black; border-radius: 0px;'>
                </div>
            </div>
            <div class='row'>
                <div class='col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4'>
                    <h5 style="font-weight: bold;">Senha</h5>
                </div>              
            </div>
            <div class='row'>       
                <div class='col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4'>
                    <input type="password" name="senha" class="form-control" style='border: 0px; border-bottom: 1px solid black; border-radius: 0px; '>
                </div>
            </div>
            <div class='row'>       
                <div class='col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4'>
                    <input type="submit" class="btn btn-default form-control" value='Entrar' style='margin-top: 30px;'>
                </div>
            </div>
            <div class='row'>       
                <div class='col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4' style='margin-top: 20px;'>
                    <a href='#' style="text-decoration: none; color: black; font-weight: bold;">Esqueceu a senha?</a>
                </div>
            </div>
            </form>
        </div>
    </body>
</html>