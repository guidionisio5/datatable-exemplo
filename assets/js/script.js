// document.ready define scripts JS que serão executados assim que a página for carregada, que a página estiver "pronta" 
$(document).ready( function () {

    // Executa a função de listar usuário
    listUser();

  });

  

// função adcionar usuarios 
const addUser = () =>{

    // captura todo formulário e cria um formData
    let dados = new FormData($('#form-usuarios')[0]);

    // envio e recebimento de dados
    const result = fetch('backend/addUser.php',{
      method: 'POST',
      body: dados
    })
    .then((response=>response.json()))
    .then((result)=>{
      // Aqui é tratado o retorno ao front
      if(result.retorno == 'ok'){
        Swal.fire({
          title: 'Atenção',
          text: result.mensagem,
          icon: 'success',
          // utilizando do if ternario para redução de escrita de codigo
          // icon: result.retorno == 'ok' ? 'success' : 'error'
        })
      }else{
        Swal.fire({
          title: 'Atenção',
          text: result.mensagem,
          icon: 'error',
        })
      }

      // limpa os campos caso o retorno tenha sucesso 
      // utilizando do if ternario para redução de escrita de codigo
      result.retorno == 'ok' ? $('#form-usuarios')[0].reset() : ''

      // recarrega a tabela se inserir o usuario for sucesso
      result.retorno == 'ok' ? listUser() : ''
    })

    
}  
// Final da função adicionar usuário



// Função listar os usuários cadastrados
const listUser = () =>{
      // envio e recebimento de dados
      const result = fetch('backend/listUser.php',{
        method: 'POST',
        body: ''
      })
      .then((response=>response.json()))
      .then((result)=>{
        // Aqui é tratado o retorno ao front

        // Função que irá montar as linhas da tabela, o map é um tipo de laço(for)
        // for(let cont=1;cont<result.length;cont++){} esse é outra maneira de fazer
        result.map(user=>{
          $('#tabela-dados').append(`
            <tr>
              <td>${user.nome}</td>
              <td>${user.email}</td>
              <td class="text-center">
                <button class="btn btn-sm btn-primary" type="button">Alterar</button>
                <button class="btn btn-sm btn-danger" onclick="removeUser()" type="button">Excluir</button>
              </td>
            </tr>
          `)
        })

        // inicia a datatable
        $('#tabela').DataTable({
          "language": { url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json'}
        });
        
      })
}
// Final da função de listar usuário



// função excluir o usuário cadastrado
const remove = fetch('backend/removeUser.php',{
  method: 'POST',
  body: ''
})
.then()
// Final da função excluir o usuário cadastrado