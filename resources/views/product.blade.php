<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container-fluid">
    <div class="row content">

        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <div class="col-sm-12">
                        <h2>Form Product</h2>
                         <form action="/transaksi" method="POST">
                                {{ csrf_field() }}

                             <input type="hidden" name="type" value="PRODUCT">
                             <div class="form-group @if ($errors->has('name')) has-error @endif">
                                 <label for="usr" >Product Name:</label>
                                 <input type="number" class="form-control" id="usr" name="name">
                                 @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                             </div>

                               <div class="form-group @if ($errors->has('address')) has-error @endif">
                                    <label for="comment">Shipping Addres:</label>
                                    <textarea class="form-control" rows="5" id="address" name="address"></textarea>
                                   @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                                </div>



                                 <div class="form-group @if ($errors->has('Price')) has-error @endif">
                                     <label for="usr" >Price:</label>
                                     <input type="number" class="form-control" id="usr" name="Price">
                                     @if ($errors->has('Price')) <p class="help-block">{{ $errors->first('Price') }}</p> @endif
                                 </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                @else
                    <h1>Anda Harus login atau register</h1>
                    <a href="{{ url('/login') }}">Login Dahulu</a>
                    <a href="{{ url('/register') }}">Register Dahulu</a>
                @endif
            </div>
        @endif
    </div>
</div>

</body>
</html>
