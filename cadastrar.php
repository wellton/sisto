<?php
  include("conexao.php");
  session_start();

  if(isset($_POST["submit"])){
      $SESSION["usuario"] = $usuario=$_POST["usuario_txt"];
      $SESSION["email"] = $email=$_POST["email_txt"];
      $SESSION["senha"] = $senha=crypt($_POST["senha_txt"]);
      $query = "SELECT * FROM sisto_usuarios WHERE usuario='$usario' OR email='$email'";
      $query = mysql_query($query) or die(mysql_error());
      $cont= mysql_num_rows($query);

      if($cont>0){
        echo "já cadastrado";
      }else{
        $query = mysql_query("INSERT INTO sisto_usuarios (usuario, email, senha) VALUES ('$usuario', '$email', '$senha')") or die (mysql_error());
        if($query)
          header("location: index.php ");
        else {
          echo "Erro no servidor. Não cadastrou. Tente novamente.";
        }
      }
  }
?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>Sisto</title>
  </head>
  <body>
    <form action="" method="POST" class="login">
      <div class="formulario_login">
      <span label="usuario">Usuário: </span>
      <span label="usuario_txt"><input type="text" name="usuario_txt" /></span>
      <span label="email">Email: </span>
      <span label="email_txt"><input type="text" name="email_txt" /></span>
      <span label="senha">Senha: </span>
      <span label="senha_txt"><input type="password" name="senha_txt" /></span>
      <span label="senha_txt"><input type="submit" name="submit" /></span>
    </div>
    </form>
  </body>
</html>
