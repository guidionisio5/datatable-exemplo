// document.ready define scripts JS que serão executados assim que a página for carregada, que a página estiver "pronta" 
$(document).ready( function () {
    // inicia a datatable
    $('#tabela').DataTable({
      "language": { url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json'}
    });
  } );

// função que adciona usuarios 
const addUser = () =>{

    // captura todo formulário e cria um formData
    let dados = new FormData($('#form-usuarios')[0]);

    // envio e recebimento de dados
    const result = fetch('backend/addUser.php',{
      method: 'POST',
      body: dados
    })
}  
