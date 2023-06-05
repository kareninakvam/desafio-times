$(document).ready(function() {
    var clientes;
    var clienteSelecionado; 
  
    function carregarListaClientes() {
      $.ajax({
        url: '/api/clientes',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          clientes = data;
  
          var clientesLista = $('#clientes-lista');
          clientesLista.empty();
  
          clientes.forEach(function(cliente) {
            var listItem = $('<li>').text('Nome: ' + cliente.nome + ', Telefone: ' + cliente.telefone);
            var editarBtn = $('<button>').addClass('editar-btn').html('<i class="fas fa-edit"></i>');
            var excluirBtn = $('<button>').addClass('excluir-btn').html('<i class="fas fa-trash"></i>');
            listItem.append(editarBtn, excluirBtn);
            clientesLista.append(listItem);
          });
        }
      });
    }
  
    carregarListaClientes();
  
    function abrirModalEdicao(cliente) {
      clienteSelecionado = cliente;
  
      $('#editar-modal #nomeEditar').val(cliente.nome);
      $('#editar-modal #telefoneEditar').val(cliente.telefone);
      $('#editar-modal #cpfEditar').val(cliente.cpf);
      $('#editar-modal #corEditar').val(cliente.cor);
      $('#editar-modal #marcaEditar').val(cliente.marca);
      $('#editar-modal #placaEditar').val(cliente.placa);
  
      $('#editar-modal').show();
    }
  
    $(document).on('click', '.editar-btn', function() {
      var listItem = $(this).parent();
      var index = $('#clientes-lista li').index(listItem);
      var cliente = clientes[index];
  
      abrirModalEdicao(cliente);
    });
  
    $(document).on('submit', '#editar-form', function(e) {
      e.preventDefault();
  
      var nome = $('#nomeEditar').val();
      var telefone = $('#telefoneEditar').val();
      var cpf = $('#cpfEditar').val();
      var cor = $('#corEditar').val();
      var marca = $('#marcaEditar').val();
      var placa = $('#placaEditar').val();
  
      $.ajax({
        url: '/api/cliente/' + clienteSelecionado.id,
        type: 'PUT',
        dataType: 'json',
        data: {
          nome: nome,
          telefone: telefone,
          cpf: cpf,
          cor: cor,
          marca: marca,
          placa: placa
        },
        success: function(data) {
    
          $('#editar-modal').hide();

          carregarListaClientes();
        }
      });
    });
  
    $(document).on('click', '.excluir-btn', function() {
      var listItem = $(this).parent();
      var index = $('#clientes-lista li').index(listItem);
      var cliente = clientes[index];
  
      $.ajax({
        url: '/api/cliente/' + cliente.id,
        type: 'DELETE',
        success: function(data) {
          carregarListaClientes();
        }
      });
    });
  
    $(document).on('click', '#add-clientes', function() {
      $('#modalAddCliente').show();
    });
  
    $(document).on('submit', '#formAddCliente', function(e) {
      e.preventDefault();
  
      var nome = $('#nomeAdd').val();
      var telefone = $('#telefoneAdd').val();
      var cpf = $('#cpfAdd').val();
      var cor = $('#corAdd').val();
      var marca = $('#marcaAdd').val();
      var placa = $('#placaAdd').val();
  
      $.ajax({
        url: '/api/cliente',
        type: 'POST',
        dataType: 'json',
        data: {
          nome: nome,
          telefone: telefone,
          cpf: cpf,
          cor: cor,
          marca: marca,
          placa: placa
        },
        success: function(data) {
          $('#modalAddCliente').hide();
  
          $('#formAddCliente')[0].reset();
  
          carregarListaClientes();
        }
      });
    });
  });
  