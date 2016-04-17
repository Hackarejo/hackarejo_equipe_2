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

                <header class="heading">
                    <h2 class="title" style="color:#fff; font-weight: bold" itemprop="name">Ofertas do pedido</h2>
                </header>
                <p id="mensageNullOfertas" class="lead"></p>

                <div class="item">
                    <ul id="listOfertas" class="">
                    </ul>
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
    <script src="js/Sync.js"></script>
    <script src="js/Funcs.lib.js"></script>

    <script>

        $().ready(function(){

            var id_pedido = "<?php echo $_REQUEST['id_pedido'] ?>";

            /* ___________________________________

                CONSULTA OFERTAS DO PEDIDO
               ___________________________________ */

            var objOfertas  = ConsultaOfertas(id_pedido);
            var length;
            if (objOfertas != null) {
                length = objOfertas.length;
            } else {
                length = 0;
            }

            /* ___________________________________

                POPULA OFERTAS
               ___________________________________ */

            // Limpa registros
            $("#listOfertas").html("");

            if(length > 0){

                $.each(objOfertas, function(key, value){

                    $("#listOfertas")
                    .append('<li>' +
                            '  <span class="name-category">' +
                            '    <span class="nm-cat">' + value.nome + '</span>' +
                            '    <span class="nm-value">R$ ' + Funcs.FormataNumero(value.valor, "pt_br") + '</span>' +
                            '  </span>' +
                            '</li>'
                    );
                });

            } else {
                $("#mensageNullOfertas").html("Você ainda não recebeu ofertas : (");
            }
        });

    </script>

</body>
</html>