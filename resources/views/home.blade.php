@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">

                        </div>
                    @endif

                        <a href="{{ url('/product') }}">Product</a>
                       ||
                        <a href="{{ url('/prepaid-balance') }}">Prepaid Balance</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
