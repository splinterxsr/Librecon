<?php 

/*  ___________________________________________________________
   |                                                           |    
   |   Autores: André Luis - email: andre.pedroso34@gmail.com  |
   |            Tiago Lima - email: tiago.m.lima@outlook.com   |
   |___________________________________________________________| 
*/

?>
<div class="span6" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-th-list"></i>
		</span>
                <h5>Minha Conta</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12" style="min-height: 260px">
                    	<?php if($this->session->userdata('tipo_usuario') == 1){?>
                    	<img src="<?php echo $usuario->img_leitor?>" alt="foto do leitor" width="30%" height="30%"/><br><br>
                    	<?php } ?>
                    <?php if($this->session->userdata('tipo_usuario') == 0){ ?>
                        <ul class="site-stats">
                            <li class="bg_ls span12"><strong>Nome: <?php echo $usuario->nome?></strong></li>
                            <li class="bg_lb span12" style="margin-left: 0"><strong>Telefone: <?php echo $usuario->telefone?></strong></li>
                            <li class="bg_lg span12" style="margin-left: 0"><strong>Email: <?php echo $usuario->email?></strong></li>
                            <li class="bg_lo span12" style="margin-left: 0"><strong>Nível: <?php echo $usuario->permissao; ?></strong></li>
                        </ul>
                      <?php }else { ?>
                      
                      <ul class="site-stats">
                            <li class="bg_ls span12"><strong>Nome: <?php echo $usuario->nome?></strong></li>
                            <li class="bg_lb span12" style="margin-left: 0"><strong>R.A: <?php echo $usuario->matricula?></strong></li>
                            <li class="bg_lg span12" style="margin-left: 0"><strong>Email: <?php echo $usuario->email?></strong></li>
                            <?php 
                            	$this->db->where('idCursos',$usuario->curso_id);
                            	$curso = $this->db->get('cursos')->row();
                            ?>
                            <li class="bg_ly span12" style="margin-left: 0"><strong>Curso: <?php echo $curso->nomeCurso?></strong></li>
                            <li class="bg_lo span12" style="margin-left: 0"><strong>Data de Cadastro: <?php echo date('d/m/Y', strtotime($usuario->dataCadastro)); ?></strong></li>
                            <?php 
                            	$this->db->where('idUsuarios',$usuario->idUsuarios);
								$this->db->where('multa',1);
								$multa = $this->db->get('usuarios')->row();
								
								if(count($multa) > 0){
								?><li class="bg_lr span12" style="margin-left: 0"><strong>Conta multada</strong></li>
								<li class="bg_lr span12" style="margin-left: 0"><strong>Vencimento da multa: <?php echo date('d/m/y H:i:s', strtotime($usuario->dataMulta));?></strong></li>
								<?php } ?>                                                    
                        </ul>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

<div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-th-list"></i>
		</span>
                <h5>Alterar Minha Senha</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12" style="min-height: 260px">
                        <form id="formSenha" action="<?php echo base_url();?>index.php/librecon/alterarSenha" method="post">
                        
                        <div class="span12" style="margin-left: 0">
                            <label for="">Senha Atual</label>
                            <input type="password" id="oldSenha" name="oldSenha" class="span12" />
                        </div>
                        <div class="span12" style="margin-left: 0">
                            <label for="">Nova Senha</label>
                            <input type="password" id="novaSenha" name="novaSenha" class="span12" />
                        </div>
                        <div class="span12" style="margin-left: 0">
                            <label for="">Confirmar Senha</label>
                            <input type="password" name="confirmarSenha" class="span12" />
                        </div>
                        <div class="span12" style="margin-left: 0; text-align: center">
                            <button class="btn btn-primary">Alterar Senha</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#formSenha').validate({
            rules :{
                  oldSenha: {required: true},  
                  novaSenha: { required: true},
                  confirmarSenha: { equalTo: "#novaSenha"}
            },
            messages:{
                  oldSenha: {required: 'Campo Requerido'},  
                  novaSenha: { required: 'Campo Requerido.'},
                  confirmarSenha: {equalTo: 'As senhas não combinam.'}
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