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
<body class="bg" itemscope="" itemtype="http://schema.org/WebPage" data-spy="scroll" data-target="#navbar" id="home" >


    <?php include $_path['includes'] . 'header.php'; ?>

    <main class="main-view" role="main">


        <section id="sobre" class="wrapper" >
            <article class="container">

    
                <div style="margin-top:150px">
                <img src="img/ico/cliente-icon.png" style="border-right:1px solid #fff;width: 11%;
padding: 0px 70px 0px 0px">

                <img src="img/ico/varejista-icon.png" style="width:  11%;
padding: 0px 0px 0 70px">
</div>  


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