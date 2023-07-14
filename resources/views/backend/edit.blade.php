<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits Valley | Edit</title>

    <link rel="stylesheet" href="{{ asset('backend') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/css/main.css">
</head>
<body>

    <header>

    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <h2 class="text-center text-success py-4">Edit Your Product</h2>
                    <form action="{{ route('updateproduct', $fruits->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                            <input type="text" name="fr_name" class="form-control" value="{{ $fruits->fr_name }}">
                        </div>

                        <div class="form-group mt-3">
                        <img src="{{ asset('uploads/products/'.$fruits->fr_img) }}" alt="PIC" height="100px" width="auto" class="mb-2">
                            <input type="file" name="fr_img" class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" name="fr_oprice" class="form-control" value="{{ $fruits->fr_oprice }}">
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" name="fr_nprice" class="form-control" value="{{ $fruits->fr_nprice }}">
                        </div>

                        <div class="form-group mt-3">
                            <input type="submit" class="form-control btn btn-success" value="Update Product">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </section>


    
    <script src="{{ asset('backend') }}/js/code.jquery.com_jquery-3.7.0.min.js"></script>
    <script src="{{ asset('backend') }}/js/all.min.js"></script>
    <script src="{{ asset('backend') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/js/main.js"></script>
</body>
</html>