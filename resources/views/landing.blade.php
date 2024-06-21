<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/landing.css') }}"> --}}
    @vite(['resources/css/landing.css', 'resources/js/landing.js'])
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


</head>

<body>
    <div id="modal--create" class="modal hidden ">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="modal__title">
                Create Product
                <div class="modal__closeButton">
                    X
                </div>
            </div>

            <div style=" width:100%; ">

                <div class="modal__input">
                    <input type="text" name="name" id="name" required>
                    <label for="name">Name</label>
                </div>
                <div class="modal__input">
                    <input type="text" name="description" id="description" required>
                    <label for="name">Description</label>
                </div>
                <div class="modal__input">
                    <input type="number" name="price" id="price" required>
                    <label for="name">Price</label>
                </div>
            </div>

            <button>Crear Producto</button>
        </form>
    </div>

    <div id="modal--edit" class="modal hidden ">
        <form action="{{ route('products.update') }}" method="POST">
            @csrf
            <div class="modal__title">
                Edit Product
                <div class="modal__closeButton --edit">
                    X
                </div>
            </div>

            <div style=" width:100%; ">

                <div class="modal__input">
                    <input type="text" name="name" id="name" required>
                    <label for="name">Name</label>
                </div>
                <div class="modal__input">
                    <input type="text" name="description" id="description" required>
                    <label for="name">Description</label>
                </div>
                <div class="modal__input">
                    <input type="number" name="price" id="price" required>
                    <label for="name">Price</label>
                </div>
            </div>

            <button>Editar Producto</button>
        </form>
    </div>









    <header class="header">
        <div class="header__logo">
            CRUD
        </div>
        <nav class="header__navigator">
            <ul>
                <li><a href="">Login</a></li>
                <li><a href="">Products</a></li>
            </ul>
        </nav>
    </header>

    <main class="products">
        <div class="products__header">
            <h1>Products</h1>

            <button class="products__button--create">Create</button>
        </div>
        <div class="products__container">
            <ul class="product__item">
                <li class="product__item--attributte product__item--index">*</li>
                <li class="product__item--attributte product__item--title">ID</li>
                <li class="product__item--attributte product__item--title">NAME</li>
                <li class="product__item--attributte product__item--title">DESCRIPTION</li>
                <li class="product__item--attributte product__item--title">PRICE</li>
                <li class="product__item--attributte product__item--title">CREATED AT</li>
                <li class="product__item--attributte product__item--buttons">

                </li>
            </ul>

            {{-- lista items --}}
            @foreach ($products as $product)
                <ul class="product__item">
                    <li class="product__item--attributte product__item--index">{{ $loop->iteration }}</li>
                    <li class="product__item--attributte ">{{ $product->id }}</li>
                    <li class="product__item--attributte ">{{ $product->name }}</li>
                    <li class="product__item--attributte ">{{ $product->description }}</li>
                    <li class="product__item--attributte ">{{ $product->price }}</li>
                    <li class="product__item--attributte ">{{ $product->created_at }}</li>
                    <li class="product__item--attributte product__item--buttons">


                        {{-- boton eliminar --}}
                        <form action="{{ route('products.destroy') }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button class="product__item--button">Eliminar</button>
                        </form>
                        {{-- boton editar --}}

                        <button class="product__item--button products__button--edit" data-id="{{$product->id}}">Editar</button>


                    </li>
                </ul>
            @endforeach









        </div>
    </main>

</body>

</html>
