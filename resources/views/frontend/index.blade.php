<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits Valley | Home</title>

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/main.css">
</head>
<body>
    <header>

    </header>

    <section class="bg-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 my-3">
                    <h2 class="text-center text-primary">Fruits Valley</h2>
                </div>
                <div class="col-lg-2">
                <div class="admin-ctrl ms-auto my-3">
                        <a href="{{ route('login') }}" class="btn btn-light text-dark">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-light text-dark">Register</a>
                    </div>
                </div>

                @if($fruits)
                    @foreach($fruits as $item)
                    <div class="col-lg-2 mt-3">
                        <div class="product shadow text-center rounded">
                            <img src="{{ asset('uploads/products/'.$item->fr_img) }}" alt="PIC" height="auto" width="160px">
                            <h4 class="h4 pt-1">{{ $item->fr_name }}</h4>
                            <h6 class="p-2"><del class="text-danger px-1">{{ $item->fr_oprice }} BDT</del> <span class="text-success px-1">{{ $item->fr_nprice }} BDT</span></h6>
                        </div>
                    </div>

                    @endforeach
                @else

                @endif

            </div>
        </div>
    </section>


    



    <script src="{{ asset('frontend') }}/js/code.jquery.com_jquery-3.7.0.min.js"></script>
    <script src="{{ asset('frontend') }}/js/all.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/js/main.js"></script>
</body>
</html>