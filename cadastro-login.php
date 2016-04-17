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
                    <h1 class="logo" style="margin: 40px 0">
                             <img src="img/ico/logo.png" style="width:300px;">
                    </h1>
                

                    
                    <form class="col s12 form validate">
                        <fieldset>
                            <div class="field col s12 ">
                                <input type="submit" class="btn-facebook" 
                                style="width:100%; background: url(img/ico/fb-logo.png) no-repeat 15px 16px #4f6aa3"  value="LOGIN COM O FACEBOOK">
                                <input type="hidden" name="action" value="login">
                            </div>
                            <div class="field col s12 ">
                                <input type="submit" class="btn-cadastre" style="width:100%; background: url(img/ico/pencil.png) no-repeat 15px 16px #be3333 "  value="CADASTRE-SE">
                                <input type="hidden" name="action" value="cadastre">
                            </div>
                        </fieldset>
                    </form>

                        <a href="#" style="color:#fff; font-weight: bold; font-size: 1.2em">LOGIN</a>
                        <a href="#" class="esqueceu">ESQUECEU A SENHA?</a>

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

</body>
</html>