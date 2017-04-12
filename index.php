<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Email</title>
    <meta name="description" content="Teste de envio de email">
    <meta name="author" content="Marcos Volpato">
    <!-- <link rel="stylesheet" href="css/styles.css?v=1.0"> -->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div id="div_do_form">
        <h1>Contato</h1><br>
        <form id="form_contato" method="post" action="email/envia-email.php">
            <label for="nome">Nome Completo <span id="asterisco">*</span></label>
            <input type="text" id="nome" size="70" name="nome"/>
            
            <label for="telefone">Telefone <span id="asterisco">*</span></label>
            <input type="text" id="telefone" size="70" name="telefone"/>
            
            <label for="email">e-mail <span id="asterisco">*</span></label>
            <input type="text" id="email" name="email" size="70"/>
            
            <label for="mensagem">Mensagem <span id="asterisco">*</span></label>
            <textarea id="mensagem" cols="53" rows="12" name="mensagem"></textarea>
            <button type="submit" class="botao_do_form" value="enviar" name="enviar">Enviar</button>
            <button type="reset" class="botao_do_form">Apagar</button>
        </form>
    </div>
    <style type="text/css">
        #div_do_form{
            width:400px;
            margin: auto;
        }
    </style>
    <!-- run javascript at the end -->
    <!--  <script src="js/scripts.js"></script>-->
</body>
</html>