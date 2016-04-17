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

    <?php include $_path['includes'] . 'header.php'; ?>

    <main class="main-view" role="main">


        <section id="sobre" class="wrapper">
            <article class="container">

                <header class="heading">

                    <div class="add-box" style="float:right;width:70px;">
                      <a href="#modal" rel="modal" class="add-pedido" style="margin-top:-10px;">+</a>
                    </div>


                    <h2 class="title" style="color:#fff; font-weight: bold" itemprop="name">Lista de pedidos
                    </h2>
                </header>
                <p id="mensageNullPedidos" class="lead"></p>

                <div class="item">
                    <ul id="listPedidos" class="">
                    </ul>
                </div>

                <!-- 32.5 -->
                <div class="window" id="modal" style="top: 36px;left: 70.5px;width: 320px;display: none;"  >
                    <a href="#" class="fechar">X </a>
                    <div>
                        <h1>Adicionar pedido</h1>
    <form id="formCadPedido" class="col s12 form validate">
        <fieldset>

            <div class="field col s12  ">
                <select name="categorias" id="formCadPedido__id_categorias" required>
                    <option disabled>Selecione uma categoria</option>        
                </select>       
            </div>
            
            <div class="field col s12 ">
                <input type="text" name="descricao" id="formCadPedido__descricao" placeholder="Descrição" required>
            </div>

            <div class="field col s12  ">
                <input type="number" name="valorMin" id="formCadPedido__valorMin" placeholder="Valor mínimo">
                <input type="number" name="valorMax" id="formCadPedido__valorMax" placeholder="Valor máximo">
            </div>

            <div class="field col s12 ">
                <input type="date" name="urgencia" id="formCadPedido__urgencia" placeholder="Urgência">
            </div>

            <div class="field col s12">
                <div class="form-msg alert">
                    <p class="message"><strong>Por favor,</strong> preencha todos os campos!</p>
                    <button class="closed" role="button">×</button>
                </div>
            </div>
            <div class="field col s12 ">
                <input type="submit" style="width:100%; background: #b71c1c"  value="Adicionar">
                <input type="hidden" name="action" value="login">
            </div>
        </fieldset>
    </form>
                    </div>
                </div>
 
 
                <!-- mascara para cobrir o site -->  
                <div id="mascara"></div>
               
                

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

            $("#formCadPedido").submit(function(){

                var id_categoria    = $("#formCadPedido__id_categorias").val();
                var descricao       = $("#formCadPedido__descricao").val();
                var valorMin        = $("#formCadPedido__valorMin").val();
                var valorMax        = $("#formCadPedido__valorMax").val();
                var data_final      = $("#formCadPedido__urgencia").val();

                if(id_categoria && descricao){
                    RegistraPedido(1, descricao, "2016-06-01", data_final, valorMin, valorMax, null, id_categoria);

                    location.reload();
                } else {
                    return false;
                }

            });

            /* ___________________________________

                CONSULTA CATEGORIAS
               ___________________________________ */

            var objCategorias = ConsultaCategorias();

            if(objCategorias.length > 0){
                $.each(objCategorias, function(key, row){
                    $('#formCadPedido__id_categorias').append($('<option>', {
                        value   : row.id_categoria,
                        text    : row.descricao
                    }));
                });
            }

            /* ___________________________________

                CONSULTA PEDIDOS
               ___________________________________ */

            var objPedidos  = ConsultaPedidos(1);
            var length      = objPedidos.length;

            // Limpa possiveis registros "lixos"
            $("#listPedidos").html("");
            $("#mensageNullPedidos").html("");

            if(length > 0){

                $.each(objPedidos, function(key, row){

                    $("#listPedidos")
                    .append('<li>' +
                            '  <a href="single.php?id_pedido=' + row.id_pedido + '">' +
                            '  <span class="name-category">' + row.descricao_categoria + '</span>' +
                            '  <div class="description-category">' + row.descricao_pedido + '  </div>' +
                            '  <div class="right">' +
                            '    <i class="fa fa-pencil" aria-hidden="true"><!-- icone--></i>' +
                            '    <i class="fa fa-trash-o" aria-hidden="true"><!-- icone--></i>' +
                            '  </div>' +
                            '  </a>' +
                            '</li>'
                    );
                });

            } else {
                $("#mensageNullPedidos").html("Você ainda não tem pedidos<br> que tal adicionar um?");
            }

        });

    </script>

</body>
</html>