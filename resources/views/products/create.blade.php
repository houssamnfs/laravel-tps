@extends("home")

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create Produit</title>
    <style>
        .error-message {
            color: #dc3545;
        }
    </style>
</head>

<body>
    @section("content")
    <div class="container">
        <h1 class="my-4">Create Produit</h1>
        

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="Libelle" class="form-label">Libelle</label>
                <input type="text" class="form-control @error('Libelle') is-invalid @enderror" name="Libelle" placeholder="Enter Libelle" value="{{ old('Libelle') }}">
                @error('Libelle')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Marque" class="form-label">Marque</label>
                <input type="text" class="form-control @error('Marque') is-invalid @enderror" name="Marque" placeholder="Enter Marque" value="{{ old('Marque') }}">
                @error('Marque')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Prix" class="form-label">Prix (DH)</label>
                <input type="text" class="form-control @error('Prix') is-invalid @enderror" name="Prix" placeholder="Enter Prix" value="{{ old('Prix') }}">
                @error('Prix')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Stock" class="form-label">Stock (DH)</label>
                <input type="text" class="form-control @error('Stock') is-invalid @enderror" name="Stock" placeholder="Enter Stock" value="{{ old('Stock') }}">
                @error('Stock')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <input type="file" class="form-control @error('Image') is-invalid @enderror" name="Image">
                @error('Image')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

           <center> <button type="submit" class="btn btn-success w-25 mb-5">Create</button></center>
        </form>
    </div>

    @endsection
</body>

</html>
