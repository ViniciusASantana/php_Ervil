
<div class="menu p-4 rounded-sm">
    <img src="imagens/logo1.jpg" alt="Imagem de Perfil" class="border border-dark rounded-lg" width="20%" height="250"/>
    
    <div class="form-group col">
        <form action="salvarComunidade.php" method="POST">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name">    
            </div>
            
            <div class="form-group  ">
                <input type="radio" id="publica" name="cat" value="0">
                <label for="male">Pública</label><br>
                <input type="radio" id="partic" name="cat" value="1">
                <label for="male">Particular</label><br>
            </div>

            <div class="form-group  ">
                <label for="top">Tópicos:</label>
                <input type="text" class="form-control" id="top" name="top">    
            </div>

            <div class="form-group">
                <label for="desc">Descrição:</label><br>
                <textarea name="desc" id="desc" rows="5" cols=50 maxlength="80" placeholder="Maxímo de 80 caracteres"></textarea>
            </div>
    </div> 
</div>
            <br>
            <button type="submit" class="btn btn-info px-3" id="disney">Criar</button>
        </form>
