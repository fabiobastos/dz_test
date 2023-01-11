<?php

class PessoasController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() 
    {
        $pessoas = $this->Pessoa->find('all',[
            'conditions' => [
                'Pessoa.sexo =' => 'Feminino',
                'TIMESTAMPDIFF(YEAR, Pessoa.nascimento, CURDATE()) >' => 20                
            ]
        ]);
        $this->loadModel('Profissao');//para preencher o select de profissoes no form de inserir
        $this->Profissao->unbindModel(
            array('hasMany' => array('Pessoa'))
        );
        $profissoes = $this->Profissao->find('all');
        $this->set( compact('pessoas','profissoes') );
    }

    public function getPessoa(int $id)
    {     
        $this->loadModel('Profissao');
        $this->layout = FALSE;
        $pessoa = $this->Pessoa->findById($id);
        $this->Profissao->unbindModel(
            array('hasMany' => array('Pessoa'))
        );
        $profissoes = $this->Profissao->find('all');//para preencher o select de profissoes no form de inserir
        $this->set(compact('pessoa','profissoes'));
        $this->render('ajax_pessoa');
    }

    public function editar(int $id)
    {
        $this->layout = FALSE;
        $this->render(false,false);
        if ($this->request->is('post')) { 
            $this->Pessoa->set(['Pessoa' => $this->request->data]);
            if ($this->Pessoa->validates()) {
                $pessoa = $this->Pessoa->findById($id);
                if($pessoa){
                    $this->Pessoa->id = $id;
                    $this->Pessoa->save($this->request->data);

                    $pessoas = $this->Pessoa->find('all',[
                        'conditions' => [
                            'Pessoa.sexo =' => 'Feminino',
                            'TIMESTAMPDIFF(YEAR, Pessoa.nascimento, CURDATE()) >' => 20                
                        ]
                    ]);
                    $this->loadModel('Profissao');//para preencher o select de profissoes no form de inserir
                    $this->Profissao->unbindModel(
                        array('hasMany' => array('Pessoa'))
                    );
                    $profissoes = $this->Profissao->find('all');
                    $this->set( compact('pessoas','profissoes') );
                    $this->render('index');
                }else{
                    throw new NotFoundException();
                }    
            }else{
                $errors = $this->Pessoa->validationErrors;
                $this->response->statusCode(400);
                echo json_encode($errors);
            }            
        }else{
            throw new NotFoundException();
        }
    }

    public function inserir()
    {
        $this->layout = FALSE;
        $this->render(false,false);
        if ($this->request->is('post')) { 
            $this->Pessoa->set(['Pessoa' => $this->request->data]);
            if ($this->Pessoa->validates()) {
                if($this->Pessoa->save($this->request->data)){
                    $pessoas = $this->Pessoa->find('all',[
                        'conditions' => [
                            'Pessoa.sexo =' => 'Feminino',
                            'TIMESTAMPDIFF(YEAR, Pessoa.nascimento, CURDATE()) >' => 20                
                        ]
                    ]);
                    $this->loadModel('Profissao');//para preencher o select de profissoes no form de inserir
                    $this->Profissao->unbindModel(
                        array('hasMany' => array('Pessoa'))
                    );
                    $profissoes = $this->Profissao->find('all');
                    $this->set( compact('pessoas','profissoes') );
                    $this->render('index');
                }
            } else {
                $errors = $this->Pessoa->validationErrors;
                $this->response->statusCode(400);
                echo json_encode($errors);
            }
            
        }else{
            throw new NotFoundException();
        }
    }

    public function deletar(int $id)
    {
        $this->layout = FALSE;
        $this->Pessoa->delete($id);

        $this->set('pessoas', $this->Pessoa->find('all',[
            'conditions' => [
                'Pessoa.sexo =' => 'Feminino',
                'TIMESTAMPDIFF(YEAR, Pessoa.nascimento, CURDATE()) >' => 20                
            ]
        ]));
        $this->render('index');
    }
}