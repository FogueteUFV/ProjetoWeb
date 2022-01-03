
<!DOCTYPE html>

<head>
    <link  rel="stylesheet" href="css/style.css">
    <link  rel="stylesheet" href="logado.css">
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


<main class="wrapper">
    <section class="section parallax bg1" style="height: 100vh;">
        <ul class="nav justify-content-center">
            <li class="nav-item navbar-dark">
              <a class="nav-link active" aria-current="page" href="index.html">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#inscreverminicursos">Inscrição Minicursos</a>
              </li>
            <li class="nav-item">
              <a class="nav-link"  href="#alterar">Alterar dados cadastrais</a>
            </li>
            </ul>
      <div class="caixa">
        <h1>Bem vindo ao evento da Semana Integrada UFV</h1>
        <img src="http://www.dci.ufv.br/wp-content/uploads/800x600-com_inscri%C3%A7%C3%A3o.png" width="25%" >
      </div>
      
    </section>

    <div>

        <section class="section static" id="inscreverminicursos" style="height: 150vh;"> 
            <h1>Selecione um dos três minicursos</h1>
            <form action="SaveCurso.php" method="post">
            <ul class="selecionarminicurso" style="display: block;" >
              <li class="slide" >
                <label>
                    <div>
                        <span class="curso" style="font-size: 30px;"> Minicurso Ethical Hacking</span>
                        <img src="cursohack.jpg" width="40%" height="150px" />
                      </div>  
                      <input class="with-gap" name="curso" type="radio" value="Hacking"/>
                      <span class="curso"> Selecionar Ethical Hacking</span> 
              </label>
              </li>
              <li class="slide">
              <label>
                <div style="display: block;">
                    <span class="curso" style="font-size: 30px;"> Minicurso Latex</span>
                    <p></p>
                    <img src="cursolatex.png" width="65%" height="150px" />
                </div>  
                  <input class="with-gap" name="curso" type="radio" value="Latex"/>
                  <span class="curso">Selecionar Latex</span>
              </label>
              </li>
              <li class="slide" >
                  <label>
                    <div style="display: block;">
                    
                        <span class="curso" style="font-size: 30px;"> Minicurso Unity</span>
                        <p></p>
                        <img src="0102unity.png" width="87%" height="150px" />
                      </div>  
                      <input class="with-gap" name="curso" type="radio" value="Unity"/>
                      <span class="curso">Selecionar Unity</span>
                  </label>
              </li>
              <div style="display: block;">
                <button class="btn waves-effect waves-ligh " type="submit" value="action">Confirmar Minicurso
                    <i class="fas fa-check"></i>

                </button>
              </div>
          </ul>
        </form>
          

    </div>
    <?php
                session_start();
                if(!isset($_SESSION['logado'])){
                    header('location: Login.php');
                }

                require_once 'InscriDAO.php';

                $inscricDAO = new InscriDAO();
                
  
                foreach($inscricDAO->ler($_SESSION['matricula']) as $ins){
           
                
                  
                  $checked1=($ins['sexo']=="Masculino")?'checked':'';
                  $checked2=($ins['sexo']=="Feminio")?'checked':'';
                  $checked3=($ins['sexo']=="Outro")?'checked':'';

                ?>

                  


        
    </section id="quemsomos">
    <section class="section parallax bg2" style="height: 150vh;">
        <h1>Alterar dados cadastrais</h1>
        <body>
            <div class="container">
                  <div class="row">
                    <div class="col s12">
                      <form name="frm" action="SaveEdit.php?" method="post" onsubmit="return valida(this)">
                        <div class="row no-space-row">
                          <div class="input-field col s12 l8">
                            <input type="text" name="nome" value="<?php echo $ins['nome'];?>" required>
                            <label for="name"  >Nome Completo</label>
                          </div>
                        </div>
                        <div class="row no-space-row">
                          <div class="input-field col s12 l8">
                                <input type="password" name="senha" value="<?php echo MD5($ins['senha']);?>" required></input>
                                <label for="senha">Senha</label>
                          </div>  
                        </div>
                        <div class="row no-space-row">
                          <div class="input-field col s12 l8">
                            <input type="email" name="email" value="<?php echo $ins['email'];?>" required></input>
                            <label for="email">E-mail</label>
                          </div>
                        </div>
                         <div class="row no-space-row">
                          <div class="input-field col s12 l8">
                            <input type="text" id="cpf" name="cpf" value="<?php echo $ins['cpf'];?>" required ></input>
                            <label for="cpf">CPF</label>
                          </div>
                        </div>
                        <div class="row no-space-row">
                            <div class="input-field col s12 l8">
                              <input type="text" name="matricula" value="<?php echo $ins['matricula'];?>" required>
                              <label for="matricula"  >Matricula</label>
                            </div>
                        </div>
                        <span>Sexo</span>
                        <div class="row no-space-row">
                            <div class="input-field col s12 l8">
                                <label>
                                    <input class="with-gap" name="sexo" type="radio" value="Feminino" <?php echo $checked2; ?> />
                                    <span>Feminino</span>
                                </label>
                            </div>
                        </div>
                        <div class="row no-space-row">
                            <div class="input-field col s12 l8">
                                    <label>
                                        <input class="with-gap" name="sexo" type="radio" value="Masculino" <?php echo $checked1; ?>/>
                                        <span>Masculino</span>
                                    </label>
                            </div>
                        </div>
                        <div class="row no-space-row">
                            <div class="input-field col s12 l8">
                                    <label>
                                        <input class="with-gap" name="sexo" type="radio"  value="Outro" <?php echo $checked3; ?>/>
                                        <span>Outro</span>
                                    </label>
                            </div>
                        </div>
    
                        <div class="row no-space-row">
                            <div class="input-field col s12 l8">
                                <input type="date" name="data" value="<?php echo $ins['data'];?>" required>
                                <label for="data">Data de Nascimento.</label>
                            </div>
                        </div>
                        <div class="col s12 l6">
                          <button class="btn waves-effect waves-ligh " type="submit" value="action" onclick="valida()">Alterar
                            <i class="far fa-paper-plane"></i>
                          </button>
                        </div>
                        <div class="row">
                        <div class="col s12 l3">
                          <button class="btn waves-effect waves-ligh  " type="reset" name="limpar" value="">Limpar  
                            <i class="fas fa-eraser"></i>
                          </button>
                          <?php }; ?>
                        </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </body>
    </section>
  </main>

</html>