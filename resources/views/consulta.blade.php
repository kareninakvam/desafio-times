<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Clientes e Placas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
@foreach ($clientes as $cliente)
    <div class="row">
      <div class="col-sm-6 mx-auto mt-5">
      <h1>Lista de Clientes pela Placa</h1>
        <div class="card p-3 rounded">
          <ul class="list-group list-group-flush">
            <li>Nome:  {{ $cliente -> nome}}  Telefone: '{{ $cliente -> telefone}} Placa: {{ $cliente -> placa}}</li>
          </ul>
        </div>
      </div>
    </div>
@endforeach
  </div>
</body>
</html>