<?php 

/*  ___________________________________________________________
   |                                                           |    
   |   Autores: André Luis - email: andre.pedroso34@gmail.com  |
   |            Tiago Lima - email: tiago.m.lima@outlook.com   |
   |___________________________________________________________| 
*/

?>
<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aEmprestimo')){ ?>
    <a href="<?php echo base_url();?>index.php/emprestimos/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Empréstimo</a>
<?php } ?>

<?php
if(!$emprestimos){?>
	<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-book"></i>
         </span>
        <h5>Emprestimos</h5>
        
        <form style="margin-left:15%" action="<?php current_url() ?>" method="post">       		
	            <select name="status" id="status" style="width:15%">                                 
	            	<option value="">Status</option>
	            	<option value="'Devolvido'">Devolvido</option>	
					<option value="'Emprestado'">Emprestado</option>   
					<option value="'Não emprestado'">Não emprestado</option>
					<option value="Atrasado">Atrasado</option>        	                               
	            </select>                                        	                       
                De: <input type="date" name="dataInicial" id="dataInicial" value="" style="width: 15%">
                Ate: <input type="date" name="dataFinal" id="dataFinal" value="" style="width: 15%">
                <input type="text" id="nome" name="nome" value="" placeholder="Procurar por nome" style="width:15%">               
                <button style="margin-bottom:1%"><i class="icon-search icon-white"></i></button>     
        	</form>        	

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Data do Empréstimo</th>
            <th>Data da Devolução</th>
            <?php if($this->session->userdata('tipo_usuario') != 1){ ?>
            <th>Leitor</th>
            <?php } ?>
            <th>Situação</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="6">Nenhum emprestimo cadastrado</td>
        </tr>
    </tbody>
</table>
</div>
</div>
<?php } else{?>


<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-book"></i>
         </span>
        <h5>Empréstimos</h5>
        
        <form style="margin-left:15%" action="<?php current_url() ?>" method="post">       		
	            <select name="status" id="status" style="width:15%">                                 
	            	<option value="">Status</option>
	            	<option value="Devolvido">Devolvido</option>	
					<option value="Emprestado">Emprestado</option>   
					<option value="Não emprestado">Não emprestado</option>
					<option value="Atrasado">Atrasado</option>        	                               
	            </select>                                        	                       
                De: <input type="date" name="dataInicial" id="dataInicial" value="" style="width: 15%">
                Ate: <input type="date" name="dataFinal" id="dataFinal" value="" style="width: 15%">
                <input type="text" id="nome" name="nome" value="" placeholder="Procurar por nome" style="width:15%">               
                <button style="margin-bottom:1%"><i class="icon-search icon-white"></i></button>     
        	</form>    

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>Data do Empréstimo</th>
            <th>Data de Vencimento</th>
            <?php if($this->session->userdata('tipo_usuario') != 1){ ?>
            <th>Leitor</th>
            <?php } ?>
            <th>Situação</th>
            <th>Visualizar/Editar/Excluir</th>
        </tr>
    </thead>
    <tbody>
    <?php
    	if($this->session->userdata('tipo_usuario') == 0){    		    	
         foreach ($emprestimos as $e) {
            $dataEmprestimo = date(('d/m/Y'),strtotime($e->dataEmprestimo));
			$dataVencimento = date(('d/m/Y'),strtotime($e->dataVencimento));
			$dataAtual = date(('d/m/Y'),strtotime(date('d/m/Y')));
                     
            echo '<tr>';
            echo '<td style="text-align:center">'.$dataEmprestimo.'</td>';
			echo '<td style="text-align:center">'.$dataVencimento.'</td>';
            echo '<td style="text-align:center"><a href="'.base_url().'index.php/leitores/visualizar/'.$e->leitor_id.'">'.$e->nome.'</a></td>';
			echo '<td style="text-align:center">'.$e->status.'</td>';
            
            
            echo '<td style="text-align:center">';
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vEmprestimo') && $e->status != 'Não emprestado'){
                echo '<a style="margin-right: 1%" href="'.base_url().'index.php/emprestimos/visualizar/'.$e->idEmprestimos.'" class="btn tip-top" title="Ver comprovante"><i class="icon-eye-open"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'eEmprestimo')){
                echo '<a style="margin-right: 1%" href="'.base_url().'index.php/emprestimos/editar/'.$e->idEmprestimos.'" class="btn btn-info tip-top" title="Editar emprestimo"><i class="icon-pencil icon-white"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'dEmprestimo')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" status="'.$e->status.'" emprestimo="'.$e->idEmprestimos.'" class="btn btn-danger tip-top" title="Excluir Emprestimo"><i class="icon-remove icon-white"></i></a>'; 
            }
            echo '</td>';
            echo '</tr>';
          }
        }else{
        	$this->db->where('leitor_id',$this->session->userdata('id'));
			$emprestimo = $this->db->get('emprestimos')->result();
        	foreach ($emprestimo as $r) {
            $dataEmprestimo = date(('d/m/Y'),strtotime($r->dataEmprestimo));
			$dataVencimento = date(('d/m/Y'),strtotime($r->dataVencimento));
			$dataAtual = date(('d/m/Y'),strtotime(date('d/m/Y')));
						
			if($dataAtual > $dataVencimento){
				$status = 'ATRASADO';
			}else{
				$status = $r->status;
			}
                     
            echo '<tr>';
            echo '<td>'.$r->idEmprestimos.'</td>';
            echo '<td>'.$dataEmprestimo.'</td>';
			echo '<td>'.$dataVencimento.'</td>';
			echo '<td>'.$status.'</td>';
                        
            echo '<td>';
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vEmprestimo') && $r->status != 'Não emprestado'){
                echo '<a style="margin-right: 1%" href="'.base_url().'index.php/emprestimos/visualizar/'.$r->idEmprestimos.'" class="btn tip-top" title="Ver comprovante"><i class="icon-eye-open"></i></a>'; 
            }          
            echo '</td>';
            echo '</tr>';
          }
        }
        ?>
        <tr>
            
        </tr>
    </tbody>
</table>
</div>
</div>
	
<?php echo $this->pagination->create_links();}?>


<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/emprestimos/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Excluir Empréstimo</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idEmprestimo" name="id" value="" />
    <input type="hidden" id="status" name="status" value=""/>
    <h5 style="text-align: center">Deseja realmente excluir este empréstimo?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Excluir</button>
  </div>
  </form>
</div>






<script type="text/javascript">
$(document).ready(function(){
   $(document).on('click', 'a', function(event) {
        
        var emprestimo = $(this).attr('emprestimo');
        $('#idEmprestimo').val(emprestimo);
        var status = $(this).attr('status');
        $('#status').val(status);
    });
});
</script>
