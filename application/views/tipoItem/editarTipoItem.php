<?php 

/*  ___________________________________________________________
   |                                                           |    
   |   Autores: André Luis - email: andre.pedroso34@gmail.com  |
   |            Tiago Lima - email: tiago.m.lima@outlook.com   |
   |___________________________________________________________| 
*/

?>
<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Editar Tipo de Item</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formTipoItem" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <?php echo form_hidden('idTipoItem',$result->idTipoItem) ?>
                        <label for="nomeTipoItem" class="control-label">Nome do Tipo<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nomeTipoItem" type="text" name="nomeTipoItem" value="<?php echo $result->nomeTipo; ?>"  />
                        </div>
                    </div>

                    

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Alterar</button>
                                <a href="<?php echo base_url() ?>index.php/tipoItem" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>




<script  src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">
      $(document).ready(function(){

           $('#formTipoItem').validate({
            rules : {
                  nomeTipo:{ required: true},
                  
                  
                  
                  
            },
            messages: {
                  nomeTipo :{ required: 'Campo Requerido.'},
                  
                  
                  
                  

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


