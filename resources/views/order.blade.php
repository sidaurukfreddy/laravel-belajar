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

    <nav class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" >Hello {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/prepaid-balance') }}">Need Prepaid Balance</a></li>
                    <li><a href="{{ url('/product') }}">Want To Buy Something</a></li>
                    <li> <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form></li>



                </ul>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <div class="container">
        <h2>History Transaksi</h2>

        <table class="table">
            <thead>
            <tr>
                <th>Order no</th>
                <th>Description</th>
                <th>Total</th>
                <th>Information</th>
            </tr>
            </thead>
            <tbody>


            @foreach ($orders as $order)


            <tr>
                <td>{{ $order->order_number }}</td>
                <td>
                @if($order->type == 'PREPAID BALANCE')
                   {{ $order->name }} for {{ $order->price  }}
                @else
                     {{ $order->name }} that cost {{ $order->price  }}
                @endif
                </td>

                <td>{{ number_format($order->price) }}</td>
                <td>

                    @if($order->status === 'Pending')
                        <a href="">Payment</a>
                    @else
                        {{ $order->status }}
                    @endif

                </td>

            </tr>
            @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>

</div>

</body>
</html>
