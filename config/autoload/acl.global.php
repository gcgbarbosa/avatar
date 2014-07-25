<?php
return array(
    'acl' => array(
        'roles' => array(
            'guest'   => null,
            'member'  => 'guest',
            'admin'  => 'member',
        ),
        'resources' => array(
            'allow' => array(
				'CsnUser\Controller\Registration' => array(
					'index'	=> 'member',
					'changePassword' => 'member',
					'editProfile' => 'member',
					'changeEmail' => 'member',
					'forgottenPassword' => 'guest',
					'confirmEmail' => 'guest',
				),
				'CsnUser\Controller\Index' => array(
					'login'   => 'guest',
					'logout'  => 'member',
					'index' => 'guest',
				),
                                'CsnCms\Controller\Index' => array(
                                        'all' => 'guest'
                                ),
                                'CsnCms\Controller\Article' => array(
					'view'	=> 'guest',
					'index' => 'admin',
					'add'	=> 'admin',
					'edit'  => 'admin',	
					'delete'=> 'admin',						
				),
				'CsnCms\Controller\Translation' => array(
					'view'	=> 'guest',
					'index' => 'admin',
					'add'	=> 'admin',
					'edit'  => 'admin',	
					'delete'=> 'admin',						
				),
				'CsnCms\Controller\Comment' => array(
					'view'	=> 'guest',
					'index' => 'admin',
					'add'	=> 'admin',
					'edit'  => 'admin',	
					'delete'=> 'admin',						
				),
				'Zend' => array(
					'uri'   => 'member'
				),
				'Application\Controller\Index' => array(
					'index'   => 'guest',
					'postar'  => 'guest',
					'comentar'  => 'guest',
					'buscar'  => 'guest',
				),

				'Application\Controller\Postar' => array(
					'index'   => 'guest',
				),
				// for CMS articles
				'Public Resource' => array(
					'view'	=> 'guest',					
				),
				'Private Resource' => array(
					'view'	=> 'member',					
				),
				'Admin Resource' => array(
					'view'	=> 'admin',					
				),
				'Aluno\Controller\Aluno' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view' => 'guest',
					'relatorio' => 'guest',
					'relatorioindividual' => 'guest',
				),
				'Professor\Controller\Professor' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
					'relatorio' => 'guest',
					'relatorioindividual' => 'guest',
				),

				'Professor\Controller\Departamento' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
				),

				'Projeto\Controller\Projeto' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
					'relatorio' => 'guest',
					'relatorioindividual' => 'guest',
				),

				'Projeto\Controller\GrupoPesquisa' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
					'relatorio' => 'guest',
				),


				'Funcionario\Controller\Funcionario' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
				),

				'Funcionario\Controller\Frequencia' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',
					'delete' => 'guest',
					'view'  => 'guest',
					'relatorio' => 'guest',
					'saida' => 'guest',
				),

				'Equipamento\Controller\Equipamento' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
					'relatorio' => 'guest',
				),
				
				'Equipamento\Controller\TipoEquipamento' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
					'relatorio' => 'guest',
				),

				'Equipamento\Controller\Tombo' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
				),

				'Sala\Controller\Sala' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
					'print' => 'guest',
				),

				'Sala\Controller\Local' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
				),

				'Sala\Controller\Ocorrencia' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
					'relatorio' => 'guest',
				),

				'Sala\Controller\ReservaSala' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
				),

				'Curso\Controller\Curso' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
					'relatorio' => 'guest',
					'relatorioindividual' => 'guest'
				),
				'Curso\Controller\Atuacao' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
				),
				'Visitante\Controller\Visitante' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
					'relatorio' => 'guest',
				),
				'Controle\Controller\Controle' => array(
					'index'   => 'guest',
					'add'	=> 'guest',
					'edit'  => 'guest',	
					'delete'=> 'guest',
					'view'=> 'guest',
					'relatorio' => 'guest',
					'saida' => 'guest',
				),
				'Busca\Controller\Busca' => array(
					'index'   => 'guest',
					'busca' => 'guest',
				),
			)
        )
    )
);
