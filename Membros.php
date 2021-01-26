<?php
if(!isset($_SESSION)){
    session_start();
}



$titulo = "Membros";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

$con= conectarBanco();
$usuario = executarSelect($con, "SELECT cargo from Usuario_has_Comunidade where usuario_idUsuario={$_SESSION['log']} and comunidade_idComunidade={$_SESSION['comID']}");
$dados = executarSelect($con, "SELECT * from Usuario_has_Comunidade where comunidade_idComunidade={$_SESSION['comID']} AND cargo>0");
?>

<main class="container mt-5">
        <div class="corpo">
            <h2><strong>Membros</strong></h2>
            <br>
        <!-- uma boa pratica de organizacao - coloque uma div para agrupar o label e o input --> 
        <div class=" px-4 d-flex a">
            
            <ul class="list-group">
                <?php
                    for($e = 0; $e < count($dados);$e++){
                        if(($e+1)%2==1){
                            $apelido=$dados[$e];
                            $membro= executarSelect($con, "SELECT * FROM Usuario WHERE idUsuario={$apelido['usuario_idUsuario']}");
                            echo "<li class='list-group-item heigthCom2 p-4'><div class='d-flex rounded-sm conteiner-sm form-group ' >"
                            . "<a class='px-2 py-1'><img src=imagens/usuario.png alt='Imagem de Perfil' class='border border-dark rounded-circle' width='60px' height='60px'/></a>"
                            . "<div class='form-group col'>";
                                switch ($apelido["cargo"]){
                                    Case 1: echo "<strong>{$membro[0]["apelido"]}</strong>";break;
                                    Case 2: echo "<strong>{$membro[0]["apelido"]}</strong>"
                                            . "<small class='rounded-sm bg-info priv'>Moderador</small>";break;
                                    Case 3 : echo "<strong>{$membro[0]["apelido"]}</strong>"
                                            . "<small class='rounded-sm bg-danger priv'>Dono</small>";
                                }
                                if ($usuario[0]["cargo"] > 1 && $_SESSION['login']==true) {
                                    echo "<form action='MembrosButtons.php' method='POST'>"
                                    . "<input type='hidden' name='ButtonUserID' value={$membro[0]['idUsuario']}>"
                                    . "<button type='submit' class='btn' name='Membros_button' value=1><small>Promover</small></button>"
                                    . "<button type='submit' class='btn' name='Membros_button' value=3><small>Diminuir</small></button>"
                                    . "<button type='submit' class='btn' name='Membros_button' value=2><small>Expusar</small></button>"
                                    . "<button type='submit' class='btn' name='Membros_button' value=0><small>Reportar</small></button>"
                                    . "</form></div></li>";
                                } else {
                                    echo "<p><button type='submit' class='btn' name='Membros_button' value=0><small>Reportar</small></button></a></div></li>";
                                }
     
                        }
                    }
                ?>

            </ul>
                <ul class="list-group">

                <?php
                    for($e = 0; $e < count($dados);$e++){
                        if(($e+1)%2==0){
                            $apelido=$dados[$e];
                            $membro= executarSelect($con, "SELECT * FROM Usuario WHERE idUsuario={$apelido['usuario_idUsuario']}");
                            echo "<li class='list-group-item heigthCom2 p-4'><div class='d-flex rounded-sm conteiner-sm form-group ' >"
                            . "<a class='px-2 py-1'><img src=imagens/usuario.png alt='Imagem de Perfil' class='border border-dark rounded-circle' width='60px' height='60px'/></a>"
                            . "<div class='form-group col'>";
                            switch ($apelido["cargo"]){
                                Case 1: echo "<strong>{$membro[0]['apelido']}</strong>";break;
                                Case 2: echo "<strong>{$membro[0]['apelido']}</strong>"
                                        . "<small class='rounded-sm bg-info priv'>Moderador</small>";break;
                                Case 3 : echo "<strong>{$membro[0]['apelido']}</strong>"
                                        . "<small class='rounded-sm bg-danger priv'>Dono</small>";
                            }
                                if ($usuario[0]["cargo"] > 1 && $_SESSION['login']==true) {
                                    echo "<form action='MembrosButtons.php' method='POST'>"
                                    . "<input type='hidden' name='ButtonUserID' value={$membro[0]['idUsuario']}>"
                                    . "<button type='submit' class='btn' name='Membros_button' value=1><small>Promover</small></button>"
                                    . "<button type='submit' class='btn' name='Membros_button' value=3><small>Diminuir</small></button>"
                                    . "<button type='submit' class='btn' name='Membros_button' value=2><small>Expusar</small></button>"
                                    . "<button type='submit' class='btn' name='Membros_button' value=0><small>Reportar</small></button>"
                                    . "</form></div></li>";
                                } else {
                                    echo "<p><button type='submit' class='btn' name='Membros_button' value=0><small>Reportar</small></button></div></li>";
                                }
                                    
                        }
                    }

                ?>

            </ul>
        </div>
        
        
        </div>
    
        
</main>

<?php
    desconectarBanco($con);
    include 'fragmentos/rodape.php'; 
?>
