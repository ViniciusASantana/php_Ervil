        <!-- Menu responsivo com imagem e texto -->
        <?php
        if(!isset($_SESSION)){
            session_start();
        }
            include '_funcoesConfigBanco.php';
            if(!isset($_SESSION['login'])){
                $_SESSION['log'] = 0;
                $_SESSION['login'] = false;
            }
            if(isset($_POST['sair'])){
                unset($_SESSION['login']);
                unset($_SESSION['log']);
                header('location:Login.php');
            }
                
            $con= conectarBanco();
            $dados= executarSelect($con, "SELECT DISTINCT * FROM Comunidade,Usuario_has_Comunidade WHERE usuario_idUsuario={$_SESSION['log']} and Cargo>0 and comunidade_idComunidade=idComunidade;");
            
        ?>

        
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <a class="navbar-brand" href="index.php">
                <img src="imagens/logo1.jpg" width="30" height="30" class="d-inline-block align-top">
                <strong>Ervil</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#meuMenu" aria-controls="meuMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="meuMenu">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="submenu1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Comunidade
                        </a>
                        <div class="dropdown-menu" aria-labelledby="submenu1">
                            <small class="p-3">Sumario</small>
                            <a class="dropdown-item" href="Comunidades.php">Encontrar</a>
                            <a class="dropdown-item" href="#.php">Populares</a>
                            <a class="dropdown-item" href="ComuniCriacao.php">Criar</a>
                            <?php
                                for($i = 0; $i < count($dados); $i++){
                                    $seguindo=$dados[$i];
                                    if($i == 0){
                                        echo "<br>"
                                        . "<small class='p-3'> Minhas comunidades</small>";
                                    }
                                    echo "<form action='indexCom.php' method='POST' name='form' id='form'><button type='submit' name='comID' class='btn dropdown-item' value={$seguindo['idComunidade']}>"
                                    . "<img src='imagens/logo1.jpg' alt='Imagem de Perfil' class='border border-dark rounded-circle' width='25px' height='25px'/>"
                                    . "       {$seguindo["nome"]}</button></form>";
                                    
                                }
                            ?>
                        </div>
                    </li>
                    <?php
                        if($_SESSION['login'] == true){
                            echo "<li class='nav-item' id='Logado'>"
                            . "<a class='nav-link' href='MeuPerfil.php'>Perfil</a> "
                            . "</li>"
                            . "<li class='nav-item'>"
                            . "<form actiom='menuResponsivo.php' method='POST'>"
                                . "<button type='submit' class='btn' id='sair' value='false' name='sair'>Sair</button>"
                            . "</form>"
                            . "</li>";
                        } else{
                            echo "<li class='nav-item'><a class='nav-link' id='entrar' href='Login.php'><strong>Entrar</strong></a></li>";
                        }
                    ?>
                    
                    

                </ul>  

            </div>
        </nav>
        <!-- fim do menu responsivo -->