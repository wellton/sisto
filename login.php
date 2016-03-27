<?php
  include("conexao.php");
  session_start();

  if(isset($_POST["submit"])){
      $usuario = $_POST["usuario_txt"];
      $senha   = $_POST["senha_txt"];
      $query   = "SELECT * FROM sisto_usuarios WHERE (usuario='$usuario' OR email='$usuario')";
      $query   = mysql_query($query) or die(mysql_error());
      $mostra  = mysql_fetch_array($query);
      $decrypt = crypt($senha, $mostra["senha"]);

      if($mostra["senha"]==$decrypt){
        $_SESSION["id"]=$mostra["id"];
        header("location:index.php");
	    }else{
        echo "<span class='erro'>O e-mail ou o usuário inserido não corresponde a nenhuma conta. Cadastre-se para abrir uma conta.</span>";
      }
  }
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Sisto</title>
    <link rel="stylesheet" href="estilo.css" />
  </head>
  <body>
    <form action="" method="POST" class="login">
      <div class="formulario_login">
        <span label="usuario">Usuário ou Email: </span>
        <span label="usuario_txt"><input type="text" name="usuario_txt" /></span>
        <span label="senha">Senha: </span>
        <span label="senha_txt"><input type="password" name="senha_txt" /></span>
        <span label="senha_txt"><input type="submit" name="submit" /></span>
      </div>
      <span label="recuperar_lnk"><a href="">Recuperar senha</a></span>
      <span label="cadastrar_lnk"><a href="cadastrar.php">Cadastre-se</a></span>
    </form>
  </body>
</html>
