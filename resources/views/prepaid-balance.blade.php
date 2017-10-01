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

            @if (Auth::check())

                <div class="col-sm-12">
                    <h2>Form prepaid</h2>
                    <form action="/transaksi" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="PREPAID BALANCE">
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            <label for="usr" >Mobile Phone:</label>
                            <input type="number" class="form-control" id="number" name="name">
                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                        </div>

                        <div class="form-group @if ($errors->has('price')) has-error @endif ">
                            <label for="sel1">Price:</label>
                            <select class="form-control" id="price" name="price">
                                <option value="">Choose</option>
                                <option value="10000">10000</option>
                                <option value="50000">50000</option>
                                <option value="100000">100000</option>
                            </select>

                            @if ($errors->has('price')) <p class="help-block">{{ $errors->first('price') }}</p> @endif
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
        @endif






</div>

</body>
</html>
