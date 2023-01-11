<div class='container mt-5'>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1>Pessoas</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button id='btn-inserir' type="button" class="btn btn-success btn-inserir"><i class="bi bi-person-fill-add"></i> Adicionar Pessoa</button>                
                </div>
            </div>
            
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>CPF</th>
                        <th>Nascimento</th>
                        <th>E-mail</th>
                        <th>Celular</th>
                        <th>Profissão</th>    
                        <th width="80px"></th> 
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php foreach($pessoas as $pessoa): ?>
                    <tr>
                        <td><?= $pessoa["Pessoa"]['nome'] ?></td>
                        <td><?= $pessoa["Pessoa"]['sexo'] ?></td>
                        <td><?= $pessoa["Pessoa"]['cpf'] ?></td>
                        <td><?= date('d/m/Y',strtotime($pessoa["Pessoa"]['nascimento'])) ?></td>
                        <td><?= $pessoa["Pessoa"]['email'] ?></td>
                        <td><?= $pessoa["Pessoa"]['celular'] ?></td>
                        <td><?= $pessoa["Profissao"]['nome'] ?></td>
                        <td>
                            <button data-pessoa-id="<?= $pessoa["Pessoa"]['id'] ?>" class='btn btn-primary btn-sm btn-editar'><i class="bi bi-pencil-square"></i></button>
                            <button data-pessoa-id="<?= $pessoa["Pessoa"]['id'] ?>" class='btn btn-danger btn-sm btn-deletar'><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>                    
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

<!-- pessoaEditarModal -->
<div class="modal fade modal-lg" id="pessoaEditarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pessoaEditarModalLabel">Editar Pessoa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalEditarBody">
                <!-- conteúdo ajax -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn-salvar-edicao">Salvar alterações</button>
            </div>
        </div>
    </div>
</div>

<!-- pessoaInserirModal -->
<div class="modal fade modal-lg" id="pessoaInserirModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pessoaInserirModalLabel">Adicionar Pessoa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalInserirBody">
               
                <form action="<?= Router::url('/pessoas/inserir', true) ?>" id="inserirPessoa">
                    <div class='row'>
                        <div class="col-md-6">
                            <label for="nome">Nome</label>
                            <input id='inserir-nome' type='text' name='nome' class="form-control mb-3"  value="">
                        </div>

                        <div class="col-md-6">
                            <label for="email">E-mail</label>
                            <input type='email' name='email' class="form-control mb-3"  value="" required>
                        </div>

                        <div class="col-md-6">
                            <label for="nascimento">Data de Nascimento</label>
                            <input type='date' name='nascimento' class="form-control mb-3" value="">
                        </div>

                        <div class="col-md-6">
                            <label for="sexo">Sexo</label>
                            <select name='sexo' class="form-control mb-3">
                                <option 
                                    value='Masculino'                                     
                                >
                                    Masculino
                                </option>
                                <option 
                                    value='Feminino'                                     
                                >
                                    Feminino
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="cpf">CPF</label>
                            <input type='text' name='cpf' class="form-control mb-3 cpfMask"  value="">
                        </div>  

                        <div class="col-md-6">
                            <label for="rg">RG</label>
                            <input type='text' name='rg' class="form-control mb-3 rgMask"  value="">
                        </div>

                        <div class="col-md-6">
                            <label for="telefone">Telefone</label>
                            <input type='text' name='telefone' class="form-control mb-3 telefoneMask"  value="">
                        </div>
                        <div class="col-md-6">
                            <label for="celular">Celular</label>
                            <input type='text' name='celular' class="form-control mb-3 celularMask"  value="">
                        </div>

                        <div class="col-md-12">
                            <label for="profissao_id">Profissão</label>
                            <select name='profissao_id' class="form-control mb-3">
                                <?php foreach($profissoes as $profissao) : ?>
                                    <option 
                                        value="<?= $profissao['Profissao']['id'] ?>"                                         
                                    >
                                        <?= $profissao['Profissao']['nome'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn-salvar-inserir">Salvar</button>
            </div>
        </div>
    </div>
</div>