<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Products</title>
  <style>
    .custom-nav {
      background-color: #0d6efd; 
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark custom-nav">
  <div class="container">
    <a class="navbar-brand" href="/products">Gestion de Produits</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/produits"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    @yield("content")
</div>

<div class="container-fluid bg-primary py-2">
  <p class="text-center text-white m-0">@ 2024</p>
</div>

</body>
</html>
