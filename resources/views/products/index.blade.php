@extends("home")

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Produits</title>
    <style>
        th, td {
            vertical-align: middle;
        }
        tr td :hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    @section("content")
    <div><a class="btn btn-success text-white ms-3  mb-3" href="{{ route('products.create') }}">create</a></div>
    @if (!$produits)

        <div class="w-100 my-5"><h1 class="text-secondary mx-auto col-4">NO DATA</h1></div>
    @else
    <div class="container">
        <table class="table ">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>Libelle</th>
                    <th>Marque</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td>{{ $produit->Libelle }}</td>
                        <td>{{ $produit->Marque }}</td>
                        <td>{{ $produit->Prix }} DH</td>
                        <td>
                            @if ($produit->Image)
                                <img src="{{ asset('images/' . $produit->Image) }}" alt="Product Image" width="50" height="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-info text-white me-2" href="{{ route('products.show', ['product' => $produit->id]) }}">Detail</a>
                                <a class="btn btn-warning text-white me-2" href="{{ route('products.edit', ['product' => $produit->id]) }}">Modifier</a>
                                <a class="btn btn-danger text-white" href="{{ route('products.destroy', ['product' => $produit->id]) }}">Supprimer</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    @endsection
</body>

</html>
