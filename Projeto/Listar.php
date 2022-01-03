<?php
  session_start();
  if(!isset($_SESSION['logado'])||($_SESSION['permi']!=1)){
      header('location: Login.php');
}

?>




<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link  rel="stylesheet" href="css/style.css">
    <link  rel="stylesheet" href="inicial.css">
    <link rel="stylesheet" href="css/gallery.theme.css">
    <link rel="stylesheet" href="css/gallery.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--Import google icon font-->
    <link href="https;//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ad8a149d8.js" crossorigin="anonymous"></script>

</head>

<body>
  <!--<form action="" method="post">
    <div>
      <input class="with-gap" name="curso" type="radio" value="1"/>
      <span> Selecionar Ethical Hacking</span> 
    </div>  
    <div>
      <input class="with-gap" name="curso" type="radio" value="2"/>
      <span>Selecionar Latex</span>
    </div>
    <div>
      <input class="with-gap" name="curso" type="radio" value="3"/>
      <span>Selecionar Unity</span>
    </div>
    <div> 
      <input class="with-gap" name="curso" type="radio" value="4"/>
      <span>Todos</span>
    </div>
    <div>
      <button class="btn waves-effect waves-ligh " type="submit" value="action" onclick="valida()">Listar
      <i class="far fa-address-book"></i></button>
    </div>
  </form>-->
    <div class="row">
      <div class="col s12 m6 l9 ">
        <table class="striped">
          <thread>
            <th>Nome:</th>
            <th>Matricula:</th>
            <th>Curso:</th>
            <th>Remover</th>
          </thread>
          <tbody>
            
            <?php
                
                require_once 'Inscricao.php';
                require_once 'InscriDAO.php';
                
                $inscricDAO = new InscriDAO();
                foreach($inscricDAO->cadastro() as $ins){
            ?>
                <tr>
                <td><?php echo $ins['nome'];?></td>
                <td><?php echo $ins['matricula'];?></td>
                <td><?php echo $ins['curso'];?></td>
                <td><?php echo "<a href='Excluir.php?matricula=".$ins['matricula']."'class='btn-floating red'><i class='far fa-trash-alt'></i></a></td>";?>
                </tr>
            <?php }; ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>


</html>
