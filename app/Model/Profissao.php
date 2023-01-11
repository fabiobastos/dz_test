<?php

class Profissao extends AppModel {
    public $hasMany = [
            'Pessoa' => [
                'className' => 'Pessoa',
                'foreignKey' => 'profissao_id'
            ]
        ];
    public $useTable = 'profissoes';
    
}