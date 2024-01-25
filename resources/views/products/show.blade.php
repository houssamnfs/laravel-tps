@extends("home")

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Produit Details</title>
    <style>
        /* Add any additional styles here */
    </style>
</head>

<body>
    @section("content")
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-secondary text-light">
                <h3>Produit Details</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Libelle:</strong> {{ $produit->Libelle }}
                </div>
                <div class="mb-3">
                    <strong>Marque:</strong> {{ $produit->Marque }}
                </div>
                <div class="mb-3">
                    <strong>Prix:</strong> {{ $produit->Prix }} DH
                </div>
                <div class="mb-3">
                    <strong>Image:</strong>
                    @if ($produit->Image)
                        <img src="{{ asset('images/' . $produit->Image) }}" alt="Product Image" width="50" height="50">
                    @else
                        No Image
                    @endif
                </div>
                <div class="d-flex">
                    <a class="btn btn-warning text-white me-2" href="{{ route('products.edit', ['product' => $produit->id]) }}">Modifier</a>
                    <form action="{{ route('products.destroy', ['product' => $produit->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>
