// VALIDADOR DE CNPJ
function validarCNPJ(cnpj) 
{
    cnpj = cnpj.replace(/[^\d]+/g,'');
    if(cnpj == '') return false;
    if (cnpj.length != 14)   return false;
    if (cnpj == "00000000000000" || cnpj == "11111111111111" || cnpj == "22222222222222" || cnpj == "33333333333333" || cnpj == "44444444444444" || 
		cnpj == "55555555555555" || cnpj == "66666666666666" || cnpj == "77777777777777" || cnpj == "78888888888888" || cnpj == "99999999999999") return false;
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {     soma += numeros.charAt(tamanho - i) * pos--;     if (pos < 2) pos = 9;    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0)) return false;

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {     soma += numeros.charAt(tamanho - i) * pos--;     if (pos < 2) pos = 9;    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1)) return false;
    return true;
}

// VALIDADOR DE EMAIL
function validacaoEmail(texto) 
{
	if (texto.indexOf("@")< 1) { alert("Confira o email"); return false; }

	var usuario = texto.substring(0, texto.indexOf("@"));
	var dominio = texto.substring(texto.indexOf("@")+1,texto.length);

	if ((usuario.length >=1) &&
		(dominio.length >=3) &&
		(usuario.search("@")==-1) &&
		(dominio.search("@")==-1) &&
		(usuario.search(" ")==-1) &&
		(dominio.search(" ")==-1) &&
		(dominio.search(".")!=-1) &&
		(dominio.indexOf(".") >=1)&&
		(dominio.lastIndexOf(".") < dominio.length - 1)) 
		{ return true; }
	else{ alert('Confira o email'); return false;	}
}


// VALIDADOR DE CPF
function valida_CPF(cpf)
{
    var numeros, digitos, soma, i, resultado, digitos_iguais;
    digitos_iguais = 1;
	cpf = cpf.replace(/[^\d]+/g,'');
    if (cpf.length < 11) { return false; }
	if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || 
		cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "78888888888" || cpf == "99999999999") return false;
    for (i = 0; i < cpf.length - 1; i++) {if (cpf.charAt(i) != cpf.charAt(i + 1))  { digitos_iguais = 0; break;  } }
    if (!digitos_iguais)
    {
          numeros = cpf.substring(0,9);
          digitos = cpf.substring(9);
          soma = 0;
          for (i = 10; i > 1; i--) { soma += numeros.charAt(10 - i) * i; }
          resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
          if (resultado != digitos.charAt(0)) { return false; }
          numeros = cpf.substring(0,10);
          soma = 0;
          for (i = 11; i > 1; i--) { soma += numeros.charAt(11 - i) * i; }
          resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
          if (resultado != digitos.charAt(1)) { return false; }
          return true;
    }	
    else
    { return false; }
}

//validar login CPF e EMAIL

function validar()
{
	var valido;
	valido = "sim";
	if (document.getElementById("cpf").value.length != 11)
	{
		alert("Insira EXATAMENTE os11 digitos do CPF");
		valido = "nao";
	}
   if (!(validacaoEmail(document.getElementById("email").value)))	{ valido = "nao"; }

   if (!(TestaCPF(document.getElementById("cpf").value))) 
   {
	 	alert('Conferir cpf: ' + document.getElementById("cpf").value); 
		valido = "nao";
   }
   if (valido == "sim") { forma.submit(); }
	
}

function valida_registro()
{
    var valido;
    valido ="sim";
    if (!(validacaoEmail(document.getElementById("email").value)))	
    { valido = "nao"; }

    if (document.getElementById("cnpj").value.length != 14)
	{
		alert("Insira EXATAMENTE os11 digitos do CPF");
		valido = "nao";
	}
    if(!(valida_senha(document.getElementById("senha").value)))
    {
        valido = "não";
    }
}

function valida_senha()
{
    if (str.length < 6) {
        return("A senha precisa ter no mínimo 6 caracteres. Use Letras e Numeros");
    } else  if (str.length >10) {
        return("A senha precisa ter no maximo 10 caracteres. Use Letras e Numeros");
    } else	if (str.search(/\d/) == -1) {
        return("A senha recisa ter NUMEROS");
    } else	if (str.search(/[a-zA-Z]/) == -1) {
        return("A senha precisa ter LETRAS");
    } else	if (str.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1) {
        return("Na senha, use somente letras e número. Não use caracters especiais");
    }
    return("ok");
}

function valida_login()
{
    var valido;
    valido ="sim";

    if (!(validacaoEmail(document.getElementById("email").value)))
    { 
        valido = "nao"; 
    }

    if(!(valida_senha(document.getElementById("senha").value)))
    {
        valido = "não";
    }
}

//validação de cadastro de fornecedores
function valida_fornecedor()
{
    var valido;
    valido = "sim"

    if(!(validarCNPJ(document.getElementById("cnpj").value)))
    {
        valido = "não";
    }
    if(!(validacaoEmail(document.getElementById("email").value)))
    {
        valido = "não"
    }

}

//validação de cadastro de clientes
function valida_cliente()
{
    var valido;
    valido = "sim"
}
