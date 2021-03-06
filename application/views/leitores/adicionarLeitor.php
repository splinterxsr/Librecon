<?php 

/*  ___________________________________________________________
   |                                                           |    
   |   Autores: André Luis - email: andre.pedroso34@gmail.com  |
   |            Tiago Lima - email: tiago.m.lima@outlook.com   |
   |___________________________________________________________| 
*/

?>
<script src="<?php echo base_url()?>js/jquery.mask.min.js"></script>
<script type="text/javascript">
	jQuery(function($){
      		$("#telefone").mask("(99)9999-9999");
      		$("#celular").mask("(99)99999-9999");
      		$("#cep").mask("99999-999");
      		$("#cpf").mask("999.999.999-99");
      	});
</script>

<script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Cadastro de Leitor</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo base_url() ?>index.php/leitores/adicionar" id="formLeitor" method="post" enctype="multipart/form-data" class="form-horizontal" >
                    <div class="control-group">
                        <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nome" type="text" name="nome" value="<?php echo set_value('nome'); ?>"  />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label for="email" class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>"  />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label for="datanasc" class="control-label">Data de Nascimento</label>
                        <div class="controls">
                            <input id="datanasc" type="date" name="datanasc" value="<?php echo set_value('datanasc'); ?>"  />
                        </div>
                    </div>

					<div class="control-group">
                        <label  class="control-label">Sexo<span class="required">*</span></label>
                        <div class="controls">
                            <select name="sexo" id="sexo">
                            	<option disabled selected>Selecione</option> 
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                        </div>
                    </div>

					<div class="control-group">
                        <label for="matricula" class="control-label">Matrícula R.A<span class="required">*</span></label>
                        <div class="controls">
                            <input id="matricula" type="text" name="matricula" value="<?php echo set_value('matricula'); ?>"  />
                        </div>
                    </div>
					
					<div class="control-group">
                        <label for="senha" class="control-label">Senha<span class="required">*</span></label>
                        <div class="controls">
                            <input id="senha" type="password" name="senha" value="<?php echo set_value('senha'); ?>"  />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label for="senha" class="control-label">Confirme a Senha<span class="required">*</span></label>
                        <div class="controls">
                            <input id="senhaConfirm" type="password" name="senhaConfirm" value="<?php echo set_value('senhaConfirm'); ?>"  />
                        </div>
                    </div>
					
					<div class="control-group">
                        <label for="telefone" class="control-label">Telefone<span class="required">*</span></label>
                        <div class="controls">
                            <input id="telefone" type="text" name="telefone" value="<?php echo set_value('telefone'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="celular" class="control-label">Celular</label>
                        <div class="controls">
                            <input id="celular" type="text" name="celular" value=""  />
                        </div>
                    </div>

					 <div class="control-group" class="control-label">
                        <label for="cpf" class="control-label">CPF<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cpf" type="text" name="cpf" value="<?php echo set_value('cpf'); ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="cep" class="control-label">CEP<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cep" type="text" name="cep" value="<?php echo set_value('cep'); ?>"  />
                        </div>
                    </div>
					
                    <div class="control-group" class="control-label">
                        <label for="rua" class="control-label">Rua<span class="required">*</span></label>
                        <div class="controls">
                            <input id="rua" type="text" name="rua" value="<?php echo set_value('rua'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="numero" class="control-label">Número<span class="required">*</span></label>
                        <div class="controls">
                            <input id="numero" type="text" name="numero" value="<?php echo set_value('numero'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="bairro" class="control-label">Bairro<span class="required">*</span></label>
                        <div class="controls">
                            <input id="bairro" type="text" name="bairro" value="<?php echo set_value('bairro'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="cidade" class="control-label">Cidade<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cidade" type="text" name="cidade" value="<?php echo set_value('cidade'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="estado" class="control-label">Estado<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estado" type="text" name="estado" value="<?php echo set_value('estado'); ?>"  />
                        </div>
                    </div>                                
                    
                    <div class="control-group">
                        <label  class="control-label">Curso<span class="required">*</span></label>
                        <div class="controls">
                            <select name="curso_id" id="curso_id">
                            	<option disabled selected>Selecione</option> 
                                  <?php foreach ($cursos as $c) {
                                      echo '<option value="'.$c->idCursos.'">'.$c->nomeCurso.'</option>';
                                  } ?>
                            </select>
                            <button type="button" id="btnRefreshCurso" class="btn btn-primary"><i class="icon-refresh icon-white"></i></button>
                            <button type="button" id="btnExpCurso" class="btn btn-success" onclick="document.getElementById('cadCurso').style.display='inline';document.getElementById('minusCurso').style.display='inline'"><i class="icon-plus icon-white"></i></button>
                            <button type="button"  class="btn btn-danger" id="minusCurso" onclick="document.getElementById('cadCurso').style.display='none';document.getElementById('minusCurso').style.display='none'" style="display:none"><i class="icon-minus icon-white"></i></button><br>
                            
                            
                            <div class="control-group" style="display: none" id="cadCurso">
                            	<label class="control-label" for="curso">Curso<span class="required">*</span></label>
                            	<div class="controls">
                            		<input type="text" id="curso" name="curso" value="" /><button type="button" id="btnAddCurso" class="btn btn-success" style="margin-left: 0.5%"><i class="icon-plus icon-white"></i></button>
                            	</div>                          	
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label  class="control-label">Grupo<span class="required">*</span></label>
                        <div class="controls">
                            <select name="grupo_id" id="grupo_id">
                            	<option disabled selected>Selecione</option> 
                                  <?php foreach ($grupos as $g) {
                                      echo '<option value="'.$g->idGrupo.'">'.$g->nomeGrupo.'</option>';
                                  } ?>
                            </select>
                            <button type="button" id="btnRefreshGrupo" class="btn btn-primary"><i class="icon-refresh icon-white"></i></button>
                           <a href="<?php echo base_url() ?>index.php/grupos/adicionar" target="_blank" id="" class="btn"><i class="icon-plus"></i></a>                           
                        </div>
                    </div>

					<div class="control-group">
                        <label  class="control-label">Situação<span class="required">*</span></label>
                        <div class="controls">
                            <select name="situacao" id="situacao">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="control-group" class="control-label">
                        <label for="observacoes" class="control-label">Observações</label>
                        <div class="controls">
                            <input id="observacoes" type="text" name="observacoes" value=""  />
                        </div>
                    </div>
                    
                    <input type="hidden" id="permissoes_id" name="permissoes_id" value="2" />
                    <input type="hidden" id="tipo_usuario" name="tipo_usuario" value="1" />
                    
                    <div class="control-group">
                        <label for="logo" class="control-label">Foto</label>
                        <div class="controls">
                            <input type="file" name="userfile" value="" />
                        </div>
                    </div>	
                                                          
                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar</button>
                                <a href="<?php echo base_url() ?>index.php/leitores" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">
	//cadastra curso
	$(document).on('click', '#btnAddCurso', function(event){
		var curso = $("#curso").val();
			if(curso != ""){
				$.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>index.php/leitores/addCurso",
                  data: "curso="+curso,
                  success: function(data)
                  {
                  	alert('Curso cadastrado!');
                  }
                  });
			}else{
				alert('Campo curso vazio!');
			}								 		
	});	
	
	//botao de refresh curso
	$(document).on('click', '#btnRefreshCurso', function(event){	
		$.ajax({
			url: "<?php echo base_url();?>index.php/leitores/getCurso",
			type: "POST",
			dataType: "json",
			success: function(cursos)
			{	
				var name, select, option;
				
				select = document.getElementById('curso_id');
				select.options.length = 0;
				
				var o1 = new Option("Selecione", "");
				select.options[select.options.length] = o1;
				o1.setAttribute('disabled', 'selected');						
				
				if(cursos.error != true){
					
					$.each(cursos, function(key, value) {
						
						var o = new Option(value['nomeCurso'], value['idCursos']);
						select.options[select.options.length] = o;
						o.setAttribute("key","value");
					
					});
				}
							
			}
			
		});
	});	
	
	//botao de refresh grupo
	$(document).on('click', '#btnRefreshGrupo', function(event){	
		$.ajax({
			url: "<?php echo base_url();?>index.php/leitores/getGrupo",
			type: "POST",
			dataType: "json",
			success: function(grupos)
			{	
				var name, select, option;
				
				select = document.getElementById('curso_id');
				select.options.length = 0;
				
				var o1 = new Option("Selecione", "");
				select.options[select.options.length] = o1;
				o1.setAttribute('disabled', 'selected');						
				
				if(grupos.error != true){
					
					$.each(grupos, function(key, value) {
						
						var o = new Option(value['nomeGrupo'], value['idGrupo']);
						select.options[select.options.length] = o;
						o.setAttribute("key","value");	
									
					});
				}
							
			}
			
		});
	});	

      $(document).ready(function(){
       	    	      	
           $('#formLeitor').validate({
            rules :{
                  nome:{ required: true},
                  telefone:{ required: true},
                  email:{ required: true},
                  sexo:{ required: true},
                  rua:{ required: true},
                  numero:{ required: true},
                  bairro:{ required: true},
                  cidade:{ required: true},
                  estado:{ required: true},
                  cep:{ required: true},
                  matricula:{ required: true},
                  cpf:{ required: true},
                  situacao:{ required: true},
                  senha:{ required: true},
                  curso_id:{ required: true},
                  grupo_id:{ required: true},
                  senhaConfirm:{ required: true}
            },
            messages:{
                  nome :{ required: 'Campo Requerido.'},
                  telefone:{ required: 'Campo Requerido.'},
                  email:{ required: 'Campo Requerido.'},
                  rua:{ required: 'Campo Requerido.'},
                  sexo:{ required: 'Campo Requerido.'},
                  numero:{ required: 'Campo Requerido.'},
                  bairro:{ required: 'Campo Requerido.'},
                  cidade:{ required: 'Campo Requerido.'},
                  estado:{ required: 'Campo Requerido.'},
                  cep:{ required: 'Campo Requerido.'},
                  matricula:{ required: 'Campo Requerido.'},
                  cpf:{ required: 'Campo Requerido.'},
                  situacao:{ required: 'Campo Requerido.'},
                  curso_id:{ required: 'Campo Requerido.'},
                  grupo_id:{ required: 'Campo Requerido.'},
                  senha:{ required: 'Campo Requerido.'},
                  senhaConfirm:{ required: 'Campo Requerido.'}

            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
           });
      });
</script>