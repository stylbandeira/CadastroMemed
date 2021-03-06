<?php if(!class_exists('Rain\Tpl')){exit;}?>    <nav class="menu">
            <ul>
                <li><a href="index.php">Cadastro</a></li>
                <li><a href="consulta.php">Consulta</a></li>
                <li><a href="teleconsulta.php">Teleconsulta</a></li>
            </ul>
        </nav>



        <br />
        <div class="container">
            <h1>WEB VÍDEO AULAS</h1>
            <h3>Select Dinâmico com AJAX + PHP + MySQL</h3>
            <br />
            <form class="form" method="POST" action="grava_dados.php">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label>SELECIONE UM ESTADO:</label>
                        <select name="estados" id="estados" class="form-control input-lg" data-live-search="true" title="Selecione o Estado"></select>
                    </div>
                    <div class="form-group">
                        <label>SELECIONE UMA CIDADE:</label>
                        <select name="cidades" id="cidades" class="form-control input-lg" data-live-search="true" title="Selecione a Cidade"></select>
                    </div>
                    <div class="form-group">
                        <label>DIGITE UM ID:</label>
                        <input name="identificador" id="identificador" class="form-control input-lg" data-live-search="true" title="Digite um ID"></input>
                    </div>
                    <div class="form-group">
                        <label>DIGITE O NOME:</label>
                        <input name="nome" id="nome" class="form-control input-lg" data-live-search="true" title="Digite o nome"></input>
                    </div>
                    <div class="form-group">
                        <label>SOBRENOME:</label>
                        <input name="sobrenome" id="sobrenome" class="form-control input-lg" data-live-search="true" title="Sobrenome"></input>
                    </div>
                    <div class="form-group">
                        <label>DATA DE NASCIMENTO:</label>
                        <input name="nascimento" id="nascimento" type="date" class="form-control input-lg" data-live-search="true" title="Data de Nascimento"></input>
                    </div>
                    <div class="form-group">
                        <label>CPF:</label>
                        <input name="cpf" id="cpf" class="form-control input-lg" data-live-search="true" title="CPF"></input>
                    </div>
                    <div class="form-group">
                        <label>E-MAIL:</label>
                        <input name="email" id="email" type="email" class="form-control input-lg" data-live-search="true" title="Sobrenome"></input>
                    </div>
                    <div class="form-group">
                        <label>SEXO:</label>
                        <select name="sexo" id="sexo" class="form-control input-lg" data-live-search="true" title="Sexo">
                        	<option value="M">Masculino</option>
                        	<option value="F">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>CRM:</label>
                        <input name="crm" id="crm" type="number" class="form-control input-lg" data-live-search="true" title="CRM"></input>
                    </div>
                    <div class="form-group">
                        <label>SELECIONE UMA ESPECIALIDADE:</label>
                        <select name="especialidade" id="especialidade" class="form-control input-lg" data-live-search="true" title="Selecione uma Especialidade"></select>
                    </div>

                    <div class="form-group">
                        <button name="submit" id="especialidade" type="submit" title="Submit">CADASTRAR</button>
                    </div>
                </div>
            </div>
            </form>
        </div>

		

		<script>
			$(document).ready(function(){
				
				carrega_dados('estados');
                carrega_dados('especialidade');
                
				
				

				function carrega_dados(tipo, cat_id = ''){
					$.ajax({
						url: "carrega_dados.php",
						method: "POST",
						data: {tipo: tipo, cat_id: cat_id},
						dataType: "json",
						success: function (data){
							var html = '';
							
							if (tipo == "estados") {
                                for (var count = 0; count < data.length; count++){
                                html += '<option value ='+data[count].sigla+'>'+data[count].nome+'</options>';
                                }
								$('#estados').html(html);
								$('#estados').selectpicker('refresh');
							} 
							else if (tipo == "cidades"){
                                for (var count = 0; count < data.length; count++){
                                html += '<option value ='+data[count].nome+'>'+data[count].nome+'</options>';
                                }
								$('#cidades').html(html);
								$('#cidades').selectpicker('refresh');
							} else {
                                for (var count = 0; count < data.length; count++){
                                html += '<option value ='+data[count].nome+'>'+data[count].nome+'</options>';
                                }
								$('#especialidade').html(html);
								$('#especialidade').selectpicker('refresh');
							}
						}
					})
				}
				$(document).on('change', '#estados', function(){
					var cat_id = $('#estados').val();
					
					carrega_dados('cidades', cat_id);
				});
			});
		</script>
	</form>