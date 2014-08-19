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
					'changePassword' => 'guest',
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
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view' => 'member',
					'relatorio' => 'member',
					'relatorioindividual' => 'member',
				),
				'Professor\Controller\Professor' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
					'relatorio' => 'member',
					'relatorioindividual' => 'member',
				),

				'Professor\Controller\Departamento' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
				),

				'Projeto\Controller\Projeto' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
					'relatorio' => 'member',
					'relatorioindividual' => 'member',
				),

				'Projeto\Controller\GrupoPesquisa' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
					'relatorio' => 'member',
					'relatorioindividual' => 'member',
				),


				'Funcionario\Controller\Funcionario' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
					'relatorioindividual' => 'member',
				),

				'Funcionario\Controller\Frequencia' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',
					'delete' => 'member',
					'view'  => 'member',
					'relatorio' => 'member',
					'saida' => 'member',
				),

				'Equipamento\Controller\Equipamento' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
					'relatorio' => 'member',
				),
				
				'Equipamento\Controller\TipoEquipamento' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
					'relatorio' => 'member',
				),

				'Equipamento\Controller\Tombo' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
				),

				'Sala\Controller\Sala' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
					'print' => 'member',
				),

				'Sala\Controller\Local' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
				),

				'Sala\Controller\Ocorrencia' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
					'relatorio' => 'member',
				),

				'Sala\Controller\ReservaSala' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
					'relatorio' => 'member'
				),

				'Curso\Controller\Curso' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
					'relatorio' => 'member',
					'relatorioindividual' => 'member'
				),
				'Curso\Controller\Atuacao' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
				),
				'Visitante\Controller\Visitante' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
					'relatorio' => 'member',
				),
				'Controle\Controller\Controle' => array(
					'index'   => 'member',
					'add'	=> 'member',
					'edit'  => 'member',	
					'delete'=> 'member',
					'view'=> 'member',
					'relatorio' => 'member',
					'saida' => 'member',
				),
				'Busca\Controller\Busca' => array(
					'index'   => 'guest',
					'busca' => 'guest',
				),
			)
        )
    )
);
