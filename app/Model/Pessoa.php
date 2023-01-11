<?php

class Pessoa extends AppModel {
    public $belongsTo = array(
        'Profissao' => array(
            'className' => 'Profissao',
            'foreignKey' => 'profissao_id'
        )
    );
    public $validate = [
            'nome' => [
                'rule' => array('minLength', 8),
                'required' => true,
                'message' => 'Preencha o Nome completo'
            ],
            'cpf' => [
                'rule' => ['minLength', 14],
                'message' => 'Preencha o CPF completo'
            ],
            'email' => [
                'rule' => ['email'],
                'message' => 'Preencha o E-mail corretamente'
            ],
            'nascimento' => [
                'rule' => 'date',
                'message' => 'Formato de data de nascimento inválido',
                'allowEmpty' => true
            ]
        ];
}