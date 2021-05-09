@extends('layouts.app')

<!--
    Dashboard view on route '/'
    Implements the table from the model
    Gets the information from the dashboards DB
 -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <section style="padding:20px 0 30px 0">
                    <h2 class="mt-2 mb-4 text-center">Base Currency: USD</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                {!! $dataTable->table() !!}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    {!! $dataTable->scripts() !!}
</div>
@endsection
