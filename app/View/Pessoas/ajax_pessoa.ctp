<form action="<?= Router::url('/pessoas/editar/'.$pessoa['Pessoa']['id'], true) ?>" id="editarPessoa">
    <div class='row'>
        <div class="col-md-6">
            <label for="nome">Nome</label>
            <input type='text' name='nome' class="form-control mb-3"  value="<?= $pessoa['Pessoa']['nome'] ?>">
        </div>

        <div class="col-md-6">
            <label for="email">E-mail</label>
            <input type='email' name='email' class="form-control mb-3"  value="<?= $pessoa['Pessoa']['email'] ?>">
        </div>

        <div class="col-md-6">
            <label for="nascimento">Data de Nascimento</label>
            <input type='date' name='nascimento' class="form-control mb-3" value="<?= $pessoa['Pessoa']['nascimento'] ?>">
        </div>

        <div class="col-md-6">
            <label for="sexo">Sexo</label>
            <select name='sexo' class="form-control mb-3">
                <option 
                    value='Masculino' 
                    <?= $pessoa['Pessoa']['sexo'] == "Masculino" ? "selected" : '' ?>
                >
                    Masculino
                </option>
                <option 
                    value='Feminino' 
                    <?= $pessoa['Pessoa']['sexo'] == "Feminino" ? "selected" : '' ?>
                >
                    Feminino
                </option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="cpf">CPF</label>
            <input id='cpf' type='text' name='cpf' class="form-control mb-3 cpfMask"  value="<?= $pessoa['Pessoa']['cpf'] ?>">
        </div>  

        <div class="col-md-6">
            <label for="rg">RG</label>
            <input id='rg' type='text' name='rg' class="form-control mb-3 rgMask"  value="<?= $pessoa['Pessoa']['rg'] ?>">
        </div>

        <div class="col-md-6">
            <label for="telefone">Telefone</label>
            <input id='telefone' type='text' name='telefone' class="form-control mb-3 telefoneMask"  value="<?= $pessoa['Pessoa']['telefone'] ?>">
        </div>
        <div class="col-md-6">
            <label for="celular">Celular</label>
            <input id='celular' type='text' name='celular' class="form-control mb-3 celularMask"  value="<?= $pessoa['Pessoa']['celular'] ?>">
        </div>

        <div class="col-md-12">
            <label for="profissao_id">Profissão</label>
            <select name='profissao_id' class="form-control mb-3">
                <?php foreach($profissoes as $profissao) : ?>
                    <option 
                        value="<?= $profissao['Profissao']['id'] ?>" 
                        <?= $pessoa['Pessoa']['profissao_id'] == $profissao['Profissao']['id'] ? "selected" : "" ?>
                    >
                        <?= $profissao['Profissao']['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</form>