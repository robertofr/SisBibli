/*Arquivo JavaScript*/

function validacao(){
	if(document.cadastro.nome.value==""){
		alert("Por favor, preencha o campo nome!");
		document.cadastro.nome.focus();
		return false;
	}
	
	if(document.cadastro.matricula.value==""){
		alert("Por avor, preencha o campo matricula!");
		document.cadastro.nome.fucus();
		return false;
	}
	
	if(document.cadastro.cpf.value.length !=11){
		alert("O campo CPF não contém 11 digitos!");
		document.cadastro.cpf.focus();
		return false;
	}
	
	if(document.cadastro.cpf.value=="" || 
       document.cadastro.cpf.value == "00000000000" || 
       document.cadastro.cpf.value == "11111111111" || 
       document.cadastro.cpf.value == "22222222222" || 
       document.cadastro.cpf.value == "33333333333" || 
       document.cadastro.cpf.value == "44444444444" || 
       document.cadastro.cpf.value == "55555555555" || 
       document.cadastro.cpf.value == "66666666666" || 
       document.cadastro.cpf.value == "77777777777" || 
       document.cadastro.cpf.value == "88888888888" || 
       document.cadastro.cpf.value == "99999999999" ){
		alert("Por favor, informe um CPF válido! ");
		document.cadastro.cpf.focus();
		return false;
	} 
	
	if(document.cadastro.email.value=="" || document.cadastro.email.value.indexOf('@')==-1 || document.cadastro.value.indexOf('.')==-1){
		alert("Por favor, digite um endereço de E-Mail válido!");
		document.cadastro.email.focus();
		return false;
	}
	
	
	if(document.cadastro.login.value=="" || document.cadastro.login.value.length < 3){
		alert("Por favor, informe um Login válido!");
		document.cadastro.login.focus();
		return false;
	}
	
	if(document.cadastro.senha.value==""){
		alert("Por favor,digite a Senha!");
		document.cadastro.senha.fucus();
		return false;
	}
	
	if(document.cadastro.lagradouro.value==""){
		alert("Por favor, informe o lagradouro!");
		document.cadastro.lagradouro.focus();
		return false;
	}
	
	if(document.cadastro.cep.value==""){
		alert("Por favor, informe o CEP corretamente!");
		document.cadastro.cep.focus();
		return false;
	}
	
	if(document.cadastro.titulo.value==""){
		alert("Por favor, informe o Título do livro!");
		document.cadastro.titulo.focus();
		return false;
	}
	
	if(document.cadastro.issn.value==""){
		alert("Por favor, informe o ISSN!");
		document.cadastro.issn.focus();
		return false;
	}
	
	 var formatoValido = /^d{2}/d{2}/d{4}$/; 
    var valido = false;
    if(!formatoValido.test(document.cadastro.dataPublicacao.value))
      alert("A data está no formato errado. Por favor corrija.");
    else{
      var dia = document.cadastro.dataPublicacao.value.split("/")[0];
      var mes = document.cadastro.dataPublicacao.value.split("/")[1];
      var ano = document.cadastro.dataPublicacao.value.split("/")[2];
      var MyData = new Date(ano, mes - 1, dia);
      if((MyData.getMonth() + 1 != mes)||
         (MyData.getDate() != dia)||
         (MyData.getFullYear() != ano))
        alert("Valores inválidos para o dia, mês ou ano. Por favor corrija.");
      else
        valido = true;
    }
    if(valido == false){
      document.cadastro.dataPublicacao.value.focus();
      document.cadastro.dataPublicacao.value.select();
    }
	
	if(document.cadastro.nomeEditora.value==""){
		alert("Por favor, informe o Nome da Editora!");
		document.cadastro.nomeEditora.focus();
		return false;
	}
	
	if(document.cadastro.cnpj.value=="" || document.cadastro.cpf.value.length !=14)){
		alert("Por favor, informe o CNPJ corretamente!");
		document.cadastro.cnpj.focus();
		return false;		
	}
	
	if(document.cadastro.resumo.value==""){
		alert("Por favor, insirar o resumo da Notícia!");
		document.cadastro.resumo.focus();
		return false;
	}
	
	if(document.cadastro.texto.value==""){
		alert("Por favor, insirar a Notícia no campo Texto!");
		document.cadastro.texto.focus();
		return false;
	}
	
	
}