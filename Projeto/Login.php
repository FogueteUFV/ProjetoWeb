<?php 
require_once 'Conexao.php';

session_start();
session_unset();
session_destroy();
session_start();

if(isset($_POST['entrar'])){
    $erros = array();
    $sql = 'select * from inscricao where matricula=? and senha=?';
    $stmt = Conexao::conecta()->prepare($sql);
    $stmt->bindValue(1,$_POST['matricula']);
    $stmt->bindValue(2,md5($_POST['senha']));
    $stmt->execute();

    if($stmt->rowCount()>0){
        //existe o usuario e senha no banco
        $resultado = $stmt->fetch();
        $_SESSION['logado'] = true;
        $_SESSION['matricula'] = $resultado['matricula'];
        $_SESSION['permi'] = $resultado['permi'];
        if($resultado['permi']==1){
          header('location: Listar.php');
        }else{
          header('location: Logado.php');
        }
        
 
    }else{
      $erro="Usuario ou senha inválidos.";
      echo "<script type='text/javascript'>alert('$erro');</script>";
    }

}


 ?>

<!DOCTYPE html>
    <head>
        <link  rel="stylesheet" href="css/style.css">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <!--Import google icon font-->
        <link href="https;//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://kit.fontawesome.com/4ad8a149d8.js" crossorigin="anonymous"></script>
        <script type="text/javascript">

            function valida(frm) {
                var senha= frm.senha.value;
                if(senha.length < 6){
                    alert("Numero de caracter insuficiente Min = 6");
                    frm.senha.focus();
                    return false;
            }


        </script>

    </head>

    <body>
        <div class="container">

            <div class="col s12 l8">
                <p>Ainda não se inscreveu?</p>
                <a href = "Cadastro.html">
                <button class="btn waves-effect waves-ligh">Cadastrar
                  <i class="fas fa-arrow-circle-right"></i> </button>
                </a>
              </div>

              <h4>Login</h4>
              <div class="row">
                <div class="col s12">
                  <form name="frm" action="" method="post" onsubmit="return valida(this)">
                    <div class="row no-space-row">
                      <div class="input-field  col s12 l8">
                        <div class="row no-space-row">
                            <div class="input-field col s12 l8">
                           
                              <input type="text" name="matricula" required/>
                              <label for="matricula"  >Matricula</label>
                            </div>
                        </div>
                        <div class="row no-space-row">
                            <div class="input-field col s12 l8">
                                  <input type="password" name="senha" required />
                                  <label for="senha"  >Senha</label>
                            </div>  
                        </div>
                    
                    <div class="col s12 l6">
                      <button class="btn waves-effect waves-ligh " type="submit" value="entrar" onclick="valida()" name="entrar" >Entrar
                        <i class="fas fa-arrow-circle-right"></i>                      </button>
                    </div>
                    <div class="col s12 l3">
                      <button class="btn waves-effect waves-ligh  " type="reset" name="limpar" value="">Limpar  
                        <i class="fas fa-eraser"></i>
                      </button>
                    </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </body>
</html>