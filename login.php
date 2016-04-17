        <?php
    require_once "bootstrap/bootstrap.php";

    // Set config page
    $page = array(
        'title' => $_config['title'] . ' - ' . $_config['slogan']
    );

?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <?php include $_path['includes'] . 'head.php'; ?>
</head>
<body class="bg" itemscope="" itemtype="http://schema.org/WebPage" data-spy="scroll" data-target="#navbar" id="home">


    <main class="main-view" role="main">

            <article class="container wrapper" style="width: 40%">
                <div class="row" >
                    <h1 class="logo" style="margin: 40px 0color:#fff; font-weight: bold">
                            <img src="img/ico/logo.png" style="width:300px;">
                    </h1>
                


                                <h1 style="color:#fff; font-weight: bold; padding: 20px 0">Faça seu Login</h1>
    <form id="autentificaUsuario" class="col s12 form validate">
        <fieldset>

            <div class="field col s12  ">
                <input type="email" name="email" id="autentificaUsuario__email" placeholder="E-mail" required value="lucashs041@gmail.com">
            </div>

            <div class="field col s12 ">
                <input type="password" name="pass" id="autentificaUsuario__password" placeholder="Senha" required value="lucas123">
            </div>

            <div class="field col s12" style="display:none;">
                <div class="form-msg alert">
                    <p class="message"><strong>Por favor,</strong> preencha todos os campos!</p>
                    <button class="closed" role="button">×</button>
                </div>
            </div>
            <div class="field col s12 ">
                <input type="submit" style="width:100%;background: url(img/ico/pencil.png) no-repeat 15px 16px #be3333 "  value="Entrar">
               
            </div>
        </fieldset>
    </form>
                     

                    </div><!-- .row -->


                    

            </article><!-- /.container-->
        </section><!-- /.wrapper -->
        
    </main>

    <script src="js/vendor/jquery-1.11.2.min.js"></script>
    <script src="js/vendor/slick.min.js"></script>
    <script src="js/vendor/jquery-scrollspy.min.js"></script>
    <script src="js/vendor/simple-lightbox.min.js"></script>
    <script src="js/main.min.js"></script>

    <script src="js/vendor/jquery.validate.min.js"></script>
    <script src="js/validate.min.js"></script>
    <script src="js/Sync.js"></script>

    <script>

    $().ready(function(){

        $("#autentificaUsuario").submit(function(){

            var email = $("#autentificaUsuario__email").val();
            var senha = $("#autentificaUsuario__password").val();

            var countUsers = AutentificaUsuario(email, senha);

            if(countUsers > 0){
                location.href = "home.php";
            } else {
                alert("Ops ... parece que você não possui um registro.");
            }

            return false;
        });
    });

    </script>

</body>
</html>