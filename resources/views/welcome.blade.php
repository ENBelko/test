@extends('layouts.app')

@section('content')
    <div id="form-block">
        <form action="" method="POST" name="products">
            @csrf
            <div class="form-group">
                <label for="name">Product name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="quantity">Product in stock</label>
                <input type="text" name="quantity" class="form-control">
            </div>
            <div class="form-group">
                <label for="quantity">Product price per 1 item</label>
                <input type="text" name="price" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
    <h1>Ordered products</h1>
    <div id="ordered-items" style="display: flex;flex-wrap: wrap">

        <div class="ordered-item"><span>Name</span></div>
        <div class="ordered-item"><span>Quantity</span></div>
        <div class="ordered-item"><span>Price</span></div>
        <div class="ordered-item"><span>Sum</span></div>

    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('submit', 'form[name="products"]', (event) => {

            event.preventDefault();

            let formData = new FormData(event.currentTarget);

            $.ajax({
                method: 'POST',
                url: '{{route('products.store')}}',
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    $('#ordered-items').append('' +
                        '<div class="ordered-item">' +
                        result.name +
                        '</div>' +
                        '<div class="ordered-item">' +
                        result.quantity +
                        '</div>' +
                        '<div class="ordered-item">' +
                        result.price +
                        '</div>' +
                        '<div class="ordered-item">' +
                        result.quantity * result.price +
                        '</div>');
                    showMsg(result.success);
                },
                error: (jqXHR, exception) => {
                    console.log(jqXHR.responseText);
                    let verrors = '';
                    $.each(jqXHR.responseJSON.errors, function (key, value) {
                        verrors += value;
                    });
                    showMsg(verrors, 'error');
                }
            })
        })
    </script>
@endsection