<?php
$config = array(
                'cursos' => array(array(
                                    'field'=>'nomeCurso',
                                    'label'=>'Nome do Curso',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'grupos' => array(array(
                                    'field'=>'nomeGrupo',
                                    'label'=>'Nome do Grpo',
                                    'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                    'field'=>'duracao_dias',
                                    'label'=>'Duração',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'qtde_max_item',
                                    'label'=>'Qtde Max de Itens',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'qtde_max_renovacao',
                                    'label'=>'Qtde Max de Renovação',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'qtde_max_reserva',
                                    'label'=>'Qtde Max de Reserva',
                                    'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                    'field'=>'validade_reserva',
                                    'label'=>'Validade da Reserva',
                                    'rules'=>'required|trim|xss_clean'
                                ))								
                ,
                'tipoItem' => array(array(
                                    'field'=>'nomeTipoItem',
                                    'label'=>'Nome do Tipo',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'categoria' => array(array(
                                    'field'=>'nomeCategoria',
                                    'label'=>'Nome da categoria',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'secao' => array(array(
                                    'field'=>'secao',
                                    'label'=>'Secao',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'colecao' => array(array(
                                    'field'=>'colecao',
                                    'label'=>'Colecao',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'editora' => array(array(
                                    'field'=>'editora',
                                    'label'=>'Editora',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'autor' => array(array(
                                    'field'=>'autor',
                                    'label'=>'Autor',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
									'field'=>'numero',
									'label'=>'Número do Sobrenome',
									'rules'=>'required|trim|xss_clean|is_unique[autor.numero]'
								))
                ,                
                'acervos' => array(array(
                                    'field'=>'titulo',
                                    'label'=>'titulo',
                                    'rules'=>'required|trim|xss_clean|is_unique[acervos.titulo]'
                                ),                               
                                array(
                                    'field'=>'estoque',
                                    'label'=>'Estoque',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'dataAquisicao',
                                    'label'=>'Data de Aquisição',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'origemAquisicao',
                                    'label'=>'Origem de Aquisição',
                                    'rules'=>'required|trim|xss_clean'
                                ),                                                              
                                array(
                                    'field'=>'tabelaCutter',
                                    'label'=>'Tabela Cutter',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'isbn',
                                    'label'=>'ISBN',
                                    'rules'=>'required|trim|xss_clean|is_unique[acervos.isbn]'
                                ),
                                array(
                                    'field'=>'anoEdicao',
                                    'label'=>'Ano de Edição',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'edicao',
                                    'label'=>'Edição',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'numero_paginas',
                                    'label'=>'Número de páginas',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'classificacao',
                                    'label'=>'Classificação',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'autor_id',
                                    'label'=>'Autor',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'idioma',
                                    'label'=>'idioma',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'usuarios' => array(array(
                                    'field'=>'nome',
                                    'label'=>'Nome',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                
                                array(
                                    'field'=>'cpf',
                                    'label'=>'CPF',
                                    'rules'=>'required|trim|xss_clean|is_unique[usuarios.cpf]'
                                ),                               
                                array(
                                    'field'=>'email',
                                    'label'=>'Email',
                                    'rules'=>'required|trim|valid_email|xss_clean|is_unique[usuarios.email]'
                                ),                                                                                                                                                         
                                array(
                                    'field'=>'telefone',
                                    'label'=>'Telefone',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,   
                'leitores' => array(array(
                				'field'=>'nome',
                				'label'=>'Nome',
                				'rules'=>'required|trim|xss_clean'
							),
							array(
								'field'=>'email',
								'label'=>'E-mail',
								'rules'=>'required|trim|valid_email|xss_clean|is_unique[usuarios.email]'
							),														
							array(
								'field'=>'matricula',
								'label'=>'Matricula R.A',
								'rules'=>'required|trim|xss_clean|is_unique[usuarios.matricula]'
							),					
							array(
								'field'=>'telefone',
								'label'=>'Telefone',
								'rules'=>'required|trim|xss_clean'
							),
							array(
								'field'=>'cpf',
								'label'=>'CPF',
								'rules'=>'required|trim|xss_clean|is_unique[usuarios.cpf]'
							),
							array(
								'field'=>'cep',
								'label'=>'CEP',
								'rules'=>'required|trim|xss_clean'
							),
							array(
								'field'=>'rua',
								'label'=>'Rua',
								'rules'=>'required|trim|xss_clean'
							),
							array(
								'field'=>'numero',
								'label'=>'Número',
								'rules'=>'required|trim|xss_clean'
							),
							array(
								'field'=>'bairro',
								'label'=>'Bairro',
								'rules'=>'required|trim|xss_clean'
							),
							array(
								'field'=>'cidade',
								'label'=>'Cidade',
								'rules'=>'required|trim|xss_clean'
							),
							array(
								'field'=>'estado',
								'label'=>'Estado',
								'rules'=>'required|trim|xss_clean'
							))
				,
                'disciplinas' => array(array(
                                    'field'=>'nomeDisciplina',
                                    'label'=>'Nome',
                                    'rules'=>'required|trim|xss_clean'
                                ))                                   
                  ,	
                'reserva' => array(array(
                                    'field'=>'dataReserva',
                                    'label'=>'data Reserva',
                                    'rules'=>'required|trim|xss_clean'
                                ))                                   
                  ,	
				  
                  'exemplares' => array(array(
                                    'field'=>'teste',
                                    'label'=>'teste',
                                    'rules'=>'trim|xss_clean'
                                ))                                   
                  ,			  				  			                
                'emprestimos' => array(array(

                                    'field' => 'dataEmprestimo',
                                    'label' => 'Data do Emprestimo',
                                    'rules' => 'required|trim|xss_clean'
                                ),
                                
                                array(
                                    'field'=>'leitor_id',
                                    'label'=>'Leitor',
                                    'rules'=>'trim|xss_clean|required'
                                ),
                                array(
                                    'field'=>'usuarios_id',
                                    'label'=>'usuarios_id',
                                    'rules'=>'trim|xss_clean|required'
                                ))				
		);
			   