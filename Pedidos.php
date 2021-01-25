<?php
$titulo = "Pedidos";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

$fotosPerfis = "imagens/usuario.png";
$idCom = $_SESSION['idCom'];
$pedido = executarSelect($con, "SELECT DISTINCT * FROM Usuario_has_Comunidade where cargo=0 and comunidade_idComunidade=$idCom");


?>

<main class="container mt-5">
        <div class="corpo">
            <h2><strong>Pedidos</strong></h2>
            <br>
        <!-- uma boa pratica de organizacao - coloque uma div para agrupar o label e o input --> 
        <div class=" px-4 d-flex a">
            
            <ul class="list-group">

                <?php
                
                    for($e = 0; $e < count($pedido);$e++){
                        if(($e+1)%2==1){
                            $us = executarSelect($con, "SELECT * FROM Usuario_has_Comunidade,Usuario where cargo=0 and idUsuario={$pedido[$e]['usuario_idUsuario']}");
                            echo "<li class='list-group-item heigthCom2 p-4 '><div class='d-flex rounded-sm conteiner-sm form-group ' >"
                            . "<a class='px-2 py-1'><img src=$fotosPerfis alt='Imagem de Perfil' class='border border-dark rounded-circle' width='60px' height='60px'/></a>"
                            . "<div class='form-group col'>"
                                . "<strong>{$us[0]['apelido']}</strong>"
                                . "<p><small>{$us[0]['idUsuario']}</small>"
                                //. "<p><textarea class='pedidos'> $pedido[$e]</textarea>"
                            . "</div>"
                            . "<form action='resPedido.php?idCom=' method='POST'>"
                                . "<input type='hidden' name='idCom' value='$idCom'>" 
                                . "<button type='submit' class='btn btn-info partic mt-3 mr-2' name='Aceitar' value='{$us[$e]['idUsuario']}'>Aceitar</button><p>"  
                            . "</form>"
                            . "<form action='delPedido.php?idCom=' method='POST'>"
                                . "<button type='submit' class='btn btn-danger partic mt-3' name='Recusar' value='{$us[$e]['idUsuario']}'>Recusar</button></div>"
                                . "<input type='hidden' name='idCom' value='$idCom'>" 
                            . "</form></div></li>";  
                                   
                        }
                    }

                ?>

            </ul>
                <ul class="list-group">

                <?php
                
                    for($e = 0; $e < count($pedido);$e++){
                        if(($e+1)%2==0){
                            $us = executarSelect($con, "SELECT * FROM Usuario_has_Comunidade,Usuario where cargo=0 and idUsuario={$pedido[$e]['usuario_idUsuario']} ");
                            echo "<li class='list-group-item heigthCom2 p-4'><div class='d-flex rounded-sm conteiner-sm form-group ' >"
                            . "<a class='px-2 py-1'><img src=$fotosPerfis alt='Imagem de Perfil' class='border border-dark rounded-circle' width='60px' height='60px'/></a>"
                            . "<div class='form-group col'>"
                                . "<strong>{$us[0]['apelido']}</strong>"
                                . "<p><small>{$us[0]['idUsuario']}</small>"
                                //. "<p><textarea class='pedidos'> $pedido[$e]</textarea>"
                            . "</div>"
                            . "<form action='resPedido.php?idCom=' method='POST'>"
                                . "<input type='hidden' name='idCom' value='$idCom'>" 
                                . "<button type='submit' class='btn btn-info partic mt-3 mr-2' name='Aceitar' value='{$us[$e]['idUsuario']}'>Aceitar</button><p>"  
                            . "</form>"
                            . "<form action='delPedido.php?idCom=' method='POST'>"
                                . "<button type='submit' class='btn btn-danger partic mt-3' name='Recusar' value='{$us[$e]['idUsuario']}'>Recusar</button></div>"
                                . "<input type='hidden' name='idCom' value='$idCom'>" 
                            . "</form></div></li>";  
                                   
                        }
                    }
                ?>

            </ul>
        </div>
        
        
        </div>
    
        
</main>

<?php
    include 'fragmentos/rodape.php';
?>