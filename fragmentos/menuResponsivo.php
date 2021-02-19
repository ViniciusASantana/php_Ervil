<?php
if (!isset($_SESSION)) {
    session_start();
}
include '_funcoesConfigBanco.php';
if (!isset($_SESSION['login'])) {
    $_SESSION['log'] = 0;
    $_SESSION['login'] = false;
    //Introduz um sistema de visitante, criando um usuario limitado, um visitante
}
if (isset($_POST['sair'])) {
    header('location:Index.php');
    session_destroy();
    //É o logout do sistema
}

$con = conectarBanco();
$dados = executarSelect($con, "SELECT DISTINCT * FROM Comunidade,Usuario_has_Comunidade WHERE usuario_idUsuario={$_SESSION['log']} and Cargo>0 and comunidade_idComunidade=idComunidade;");
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel|Fauna+One">

<style>
    h1 {
        font-family: Cinzel, serif;
        font-size: 46px;  
    }
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-dark border border-light ">
    <a class="navbar-brand" href="index.php">
  
        <div class="text-white">
            <h1>Ervil</h1>
        </div>
        
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#meuMenu" aria-controls="meuMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="meuMenu">
        <ul class="navbar-nav">
            
               
                    <a class="nav-link" href="index.php" > 
                    <div class="text-white">Inicio</div>
                    </a>
               
            
            <li class="nav-item dropdown" >
               
                <a class="nav-link dropdown-toggle"  href="#" id="submenu1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > 
                    <div class="text-white" id="estilo-letra-rodape">Comunidade</div>
                   
                </a>
                <div class="dropdown-menu"  aria-labelledby="submenu1">
                    <small class="p-3">Sumario</small>
                    <a class="dropdown-item" href="Comunidades.php">Encontrar</a>
                    <?php
                    if($_SESSION['login']==true)
                    echo "<a class='dropdown-item' href='ComuniCriacao.php'>Criar</a>";
                    else echo "<a class='dropdown-item disabled' href='ComuniCriacao.php'>Criar</a>";
                    
                    for ($i = 0; $i < count($dados); $i++) {
                        $seguindo = $dados[$i];
                        if ($i == 0) {
                            echo "<br>"
                            . "<small class='p-3'> Minhas comunidades</small>";
                        }
                        echo "<form action='indexCom.php' method='POST' name='form' id='form'><button type='submit' name='comID' class='btn dropdown-item' value={$seguindo['idComunidade']}>"
                        . "<img src={$seguindo["foto_Comunidade"]} alt='Imagem de Perfil' class='border border-dark rounded-circle' width='25px' height='25px'/>"
                        . "       {$seguindo["nome"]}</button></form>";
                    }
                    ?>
                </div>
            </li>
            
<?php
if ($_SESSION['login'] == true) {
    echo "<li class='nav-item' id='Logado' style='margin-left:77vw;'>"
    . "<a class='nav-link text-white' href='MeuPerfil.php'>Perfil</a> "
    . "</li>"
    . "<li class='nav-item '>"
    . "<form actiom='menuResponsivo.php' method='POST'>"
    . "<button type='submit' class='btn text-white' id='sair' value='false' name='sair'>Sair</button>"
    . "</form>"
    . "</li>";
} else {
    echo "<li class='nav-item'><a class='nav-link text-white' href='Login.php'><strong style='margin-left: 78vw;'>Entrar</strong></a></li>";
}
?>



        </ul>  

    </div>
</nav>
<!-- fim do menu responsivo -->