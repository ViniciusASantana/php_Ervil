<div>  
    <form action="salvarCadastro.php" method="POST">
            <div class="form-group col">
                <label for="apelido">Apelido:</label>
                <input type="text" class="form-control" id="apelido" name="apelido" required>    
            </div>
            
            <div class="form-group col">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>    
            </div>
            
            <div class="form-group col ">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>    
            </div>
            
            <div class="form-group col ">
                <label for="passConf">Confirme a senha:</label>
                <input type="password" class="form-control" id="passConf" name="passConf" required>    
            </div>
            
            <a class="p-5" href="Login.php">Clique aqui para se já é cadastrado</a>
            <br>
            <br>
            <br>
            <button type="submit" class="btn btn-info" id="confirmar">Confirmar</button>
        </form>
</div>
