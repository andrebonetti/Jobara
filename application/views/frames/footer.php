			<footer>
				<div class="myContainer">
			    	<div class="fot fot-1">
						<div class="subfot sub1-1">
                            <h4>Endereço:</h4>
                            
                            Av. São Miguel, 7.573<br> 
                            Parque Cruzeiro do Sul<br>
                            São Paulo, SP<BR>
                            CEP: 08070-001
                            
						</div>
                        <div class="subfot sub1-2">
                            <h4>Telefones:</h4>
                            (11) 2956-6980<br>
                            (11) 2956-5051 			            	
						</div>
                            
                        <div class="subfot sub1-2">
                            <h4>Email:</h4>
                            jobara@jobara.com.br 		            	
						</div>
                        
                        <div class="subfot sub1-2 redes-sociais">
                            <h4>Redes Sociais:</h4>
                            <div class="social">
                                <a href="https://www.facebook.com/jobaraimoveis/?fref=ts" target="_blank">
                                    <img src="<?= base_url("img/facebook.png")?>" alt="Facebook Jobara Compra Aluguel Imóveis">
                                    <p>Facebook</p> 
                                </a>	
                            </div>    
                            	            	
						</div>
                            
			     	</div>    
			        
			        <div class="fot login">
			        	<?=anchor("#","<img src='".base_url('img/cadeado_icon.png')."' alt='acesso restrito jobara imoveis'>
				        <h4>Acesso<br>Area Restrita</h4>",array(
				        	"id"=>"modal_login",
                            "data-toggle"=>"modal",
                            "data-target"=>".bs-example-modal-sm",
                            "tabindex"=>"-1",
                            "data-whatever"=>"@getbootstrap"))?>
			        </div>	        
				</div>   
			</footer>
		</section>

        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                    <h4 class="modal-title" id="exampleModalLabel">Acesso a Área restrita</h4>                 
                </div>
                
                <?= form_open("adm/signin")?>
	                <div class="modal-body">
	               
	                        <label>Login:</label>
	                        <input type="text" class="form-control" name="usuario" required autofocus>
	                        
	                        <label>Senha:</label>
	                        <input type="password" class="form-control" name="senha" required><br>
	                    
	                </div>
	                <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Entrar">
	                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	                </div>
                <?= form_close()?>
                
            </div>
        </div>
        </div>
        
        

	</body> 
</html>