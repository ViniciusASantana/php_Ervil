

    
    <form action="salvarComunidade.php" class="mx-auto" method="POST" enctype="multipart/form-data" style="background-color:white;padding: 2vw;border-radius: 0.3rem;">
            <h5><strong>Criar nova Comunidade</strong></h5>
            <br>
            <div class="d-flex" style="width: 100%;">
                <div class="mx-auto" style="width:30%;">
                    <img src="imagens/cam.png" alt="Imagem de Perfil" class="border border-dark rounded-lg" width="200rem" height="250rem"/>
                    <br><br>
                    <input name='foto_comunidade' id="foto_comunidade" type="file" required>
                </div>

                <div class="media-body">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name" required >    
                    </div>
                    
                    <div class="form-group  ">
                        Categória:
                        <br>
                        <input type="radio" id="publica" name="cat" value="0">
                        <label for="male">Pública</label><br>
                        <input type="radio" id="partic" name="cat" value="1">
                        <label for="male">Particular</label><br>
                    </div>

                    <div class="form-group  ">
                        <label for="top">Tópicos:</label>
                        <input type="text" class="form-control" id="top" name="top">    
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="desc">Descrição:</label><br>
                        <textarea name="desc" id="desc" rows="5" cols=50 maxlength="80" placeholder="Maxímo de 80 caracteres"></textarea>
                    </div>
                </div>
                
            </div>
            <br>
            <div style="text-align: right;">
            <button type="submit" class="btn btn-info px-3" >Criar</button>
            </div>
        </form>
    
</div>
            
        
