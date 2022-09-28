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
        let datahora = moment().format('DD/MM/YY HH:mm')
        $('#horario-atualizado').html(datahora)

        // destroi a tabela que foi iniciada
        $("#tabela").dataTable().fnDestroy()

        // limpa os dados da tabela
        $("#tabela-dados").html('')

        // Função que irá montar as linhas da tabela, o map é um tipo de laço(for)
        // for(let cont=1;cont<result.length;cont++){} esse é outra maneira de fazer
        result.map(user=>{
          $('#tabela-dados').append(`
            <tr>
              <td>${user.nome}</td>
              <td>${user.email}</td>
              <td>${user.data_cadastro}</td>
              <td>

                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="ativo" ${user.ativo == 1 ? 'checked' : ''} onchange="updateUserActive(${user.id})">
                </div>
            
              </td>
              <td>
                <button class="btn btn-primary" type="button"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-danger" onclick="deleteUser(${user.id})" type="button"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
          `)
        })

        // inicia a datatable
        $('#tabela').dataTable({
          "language": { url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json'
          },
          retrieve: true,
        });
        
      })
}

// CSS dinâmico de botão para sim e não
/* <button class="btn btn-${user.ativo == 1 ? 'success' : 'danger'}" type='button'>${user.ativo == 1 ? '<i class="bi bi-toggle-on"></i>' : '<i class="bi bi-toggle-off"></i>'}</button>  */

// Final da função de listar usuário



// função que altera o status de ativo do usuario
const updateUserActive = (id) => {
  const result = fetch('backend/updateUserActive.php',{
    method: 'POST',
    body: `id=${id}`,
    headers: {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  })
  .then((response) => response.json())
  .then((result) => {
    Swal.fire({
      icon: result.retorno == 'ok' ? 'success' : 'error',
      title: 'Atenção',
      text: result.mensagem,
      showConfiirmButton: false,
      timer: 2000
    })
  })
}
// Final função que altera o status de ativo do usuario



// função excluir o usuário cadastrado
const deleteUser = (id) => {
  const result = fetch('backend/deleteUser.php',{
    method: 'POST',
    body: `id=${id}`,
    headers: {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  })
  .then((response) => response.json())
  .then((result) => {

    Swal.fire({
      icon: result.retorno == 'ok' ? 'success' : 'error',
      title: 'Atenção',
      text: result.mensagem,
      showConfiirmButton: false,
      timer: 2000
    })

    // recarrega a listar usuário
    listUser();

  })
}
// Final da função excluir o usuário cadastrado