<div class="my-content contato">
	<div class="myContainer">
        
        <?php $msg = $this->session->flashdata('msg-success'); if (!empty($msg)){?>
		 	<p class="alert alert-success"><?=$msg?></p>
	    <?php } ?>  

        <h1>Formulário de e-mail: </h1>

        <?= form_open('contato/email_send')?>

            <table class="table no-phone">	

                <tr>
                    <td class="cab-cont">Assunto</td>
                    <td colspan="3">
                        <SELECT class="form-control" name="assunto">
                            <OPTION VALUE="Orçamento">Orçamento</OPTION>
                            <OPTION VALUE="Currículo">Curriculo</OPTION>
                            <OPTION VALUE="Dúvidas">Duvidas</OPTION>
                            <OPTION VALUE="Reclamações">Reclamações</OPTION>
                            <OPTION VALUE="Outros">Outros</OPTION>
                        </SELECT>
                    </td>
                </tr>       
                <tr>
                    <td class="cab-cont">Anexar Documento:</td>
                    <td colspan="3">
                        <input type="file" name="arquivo" id="arquivo" /> 
                    </td>
                </tr>                
                <tr>
                    <td>Nome:</td>
                    <td colspan="3"><input type="text" name="nome" class="form-control"  required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" class="form-control" placeholder="exemplo@exemplo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required></td>
                    <td>Telefone:</td>
                    <td><input type="tel" name="tel" class="form-control" placeholder="DDD + Número" required></td>
                </tr>
                </tr>
                <tr>
                    <td>Cidade:</td>
                    <td><input type="text" name="cidade" class="form-control" required></td>
                    <td>Estado:</td>
                    <td><select name="estado" class="form-control" required>
                            <option value="estado">Selecione o Estado</option> 
                            <option value="ac">Acre</option> 
                            <option value="al">Alagoas</option> 
                            <option value="am">Amazonas</option> 
                            <option value="ap">Amapá</option> 
                            <option value="ba">Bahia</option> 
                            <option value="ce">Ceará</option> 
                            <option value="df">Distrito Federal</option> 
                            <option value="es">Espírito Santo</option> 
                            <option value="go">Goiás</option> 
                            <option value="ma">Maranhão</option> 
                            <option value="mt">Mato Grosso</option> 
                            <option value="ms">Mato Grosso do Sul</option> 
                            <option value="mg">Minas Gerais</option> 
                            <option value="pa">Pará</option> 
                            <option value="pb">Paraíba</option> 
                            <option value="pr">Paraná</option> 
                            <option value="pe">Pernambuco</option> 
                            <option value="pi">Piauí</option> 
                            <option value="rj">Rio de Janeiro</option> 
                            <option value="rn">Rio Grande do Norte</option> 
                            <option value="ro">Rondônia</option> 
                            <option value="rs">Rio Grande do Sul</option> 
                            <option value="rr">Roraima</option> 
                            <option value="sc">Santa Catarina</option> 
                            <option value="se">Sergipe</option> 
                            <option value="sp">São Paulo</option> 
                            <option value="to">Tocantins</option> 
                        </select>
                    </td>

                </tr>
                <tr>
                    <td>Mensagem:</td>
                    <td colspan="3"><textarea class="form-control" name="mensagem" required ></textarea></td>
                </tr>
                <tr>
                    <td><button type="submit" class="btn btn-primary" spellcheck="true">Enviar</button></td>
                </tr>
            </table>
    
        <?= form_close()?>
        
        <?= form_open('contato/email_send')?>
    
            <div class="only-phone">
                <SELECT class="form-control" name="assunto">
						<OPTION VALUE="0">Escolha um Assunto</OPTION>
						<OPTION VALUE="Orçamento">Orçamento</OPTION>
						<OPTION VALUE="Currículo">Curriculo</OPTION>
						<OPTION VALUE="Dúvidas">Duvidas</OPTION>
						<OPTION VALUE="Reclamações">Reclamações</OPTION>
						<OPTION VALUE="Outros">Outros</OPTION>
					</SELECT>
							
					<input type="text" name="nome" class="form-control"  placeholder="Nome" required>
					
					<input type="email" name="email" class="form-control" placeholder="Email: exemplo@exemplo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
					
					<input type="tel" name="tel" class="form-control" placeholder="Telefone: DDD + Número" required>

					<textarea rows="5" class="form-control" name="mensagem" placeholder="Comentário" required ></textarea><br>
					
					<button type="submit" class="btn btn-primary" spellcheck="true">Enviar</button>

                
            </div>
    
        <?= form_close()?>
    
	</div>
</div>

