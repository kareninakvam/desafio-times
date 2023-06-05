<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Clientes e Placas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="script.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-sm-6 mx-auto mt-5">
      <h1>Lista de Clientes</h1>
        <button class="btn btn-dark mt-3" id="add-clientes">Adicionar novo Cliente</button>
        <form action="/clientes/placas" method="POST">
          @csrf
          <label for="ultimo_numero">Último número:</label>
          <input type="text" name="ultimo_numero" id="ultimo_numero">
          <button type="submit">Enviar</button>
        </form>
        <div class="card p-3 rounded">
          <ul class="list-group list-group-flush" id="clientes-lista"></ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Add Cliente-->
  <div id="modalAddCliente" style="display: none;">
    <form id="formAddCliente">
    <label for="nomeAdd">Nome:</label>
      <input type="text" id="nomeAdd" name="nome" required>
      <br>
      <label for="telefoneAdd">tel:</label>
      <input type="text" id="telefoneAdd" name="telefone" required>
      <br>
      <label for="cpfAdd">CPF:</label>
      <input type="text" id="cpfAdd" name="cpf" required>
      <br>
      <label for="corAdd">Cor:</label>
      <input type="text" id="corAdd" name="cor" required>
      <br>
      <label for="marcaAdd">Marca:</label>
      <input type="text" id="marcaAdd" name="marca" required>
      <br>
      <label for="placaAdd">Placa:</label>
      <input type="text" id="placaAdd" name="placa" required>
      <br>
      <button type="submit">Adicionar</button>
    </form>
  </div>

  <!-- Modal Edição-->
  <div id="editar-modal" style="display: none;">
        <h2>Editar Cliente</h2>
        <form id="editar-form">
        <label for="nomeEditar">Nome:</label>
      <input type="text" id="nomeEditar" name="nome" required>
      <br>
      <label for="telefoneEditar">tel:</label>
      <input type="text" id="telefoneEditar" name="telefone" required>
      <br>
      <label for="cpfEditar">CPF:</label>
      <input type="text" id="cpfEditar" name="cpf" required>
      <br>
      <label for="corEditar">Cor:</label>
      <input type="text" id="corEditar" name="cor" required>
      <br>
      <label for="marcaEditar">Marca:</label>
      <input type="text" id="marcaEditar" name="marca" required>
      <br>
      <label for="placaEditar">Placa:</label>
      <input type="text" id="placaEditar" name="placa" required>
      <br>
            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>
