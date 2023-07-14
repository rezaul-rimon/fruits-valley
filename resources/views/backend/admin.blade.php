<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits Valley | Admin</title>

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
                <div class="col-lg-4">
                    <h2 class="text-center text-success py-4">Add a new Product</h2>
                    <form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                            <input type="text" name="fr_name" class="form-control" placeholder="Name of Fruit">
                        </div>

                        <div class="form-group mt-3">
                            <input type="file" name="fr_img" class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" name="fr_oprice" class="form-control" placeholder="Old Price">
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" name="fr_nprice" class="form-control" placeholder="New Price">
                        </div>

                        <div class="form-group mt-3">
                            <input type="submit" class="form-control btn btn-success" value="Add Product">
                        </div>

                    </form>
                </div>

                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <h2 class="text-center text-primary py-4">Manage Fruits</h2>
                        </div>
                        <div class="col-lg-2 py-4">
                            <a href="{{ route('logout') }}" class="btn btn-secondary text-white">Logout</a>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <tr>
                            <th>#SL</th>
                            <th>Name</th>
                            <th>Pic</th>
                            <th>Old Price</th>
                            <th>New Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        @php
                            $i = 1;
                        @endphp
                       
                        @if(count($fruits) > 0)    
                            @foreach($fruits as $item)
                            <tr>  
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->fr_name }}</td>
                                <td><img src="{{ asset('uploads/products/'.$item->fr_img) }}" alt="PIC" height="80px" width="auto"></td>
                                <td>{{ $item->fr_oprice }}</td>
                                <td>{{ $item->fr_nprice }}</td>
                                <td>
                                    @if($item->fr_status == 1)
                                        <a href="{{ route('actoin', $item->id) }}" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></a>
                                    @else
                                        <a href="{{ route('intoac', $item->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('editproduct', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('delproduct', $item->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>         
                            @endforeach

                        @else
                        <tr>
                            <td colspan="7">Data Not Found</td>
                        </tr>
                        @endif                        
                        
                    </table>
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