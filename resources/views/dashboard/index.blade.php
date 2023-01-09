@extends('layouts.base')


@section('body')

<link href="{{asset('css/dashboard.css')}}" rel="stylesheet"> 

<div class="container" style="text-align: center">
<div class="chart-container">
<h4>Active Users</h4>
<div class="card">
    <canvas id="titleChart"></canvas>
</div>
</div>
</div>

<div class="container" style="text-align: center">
    <div class="chart-container">
        <div class="card-body">
            <h5 class="card-title">Sales</h5>
        </div>
    <canvas id="SalesChart"></canvas>
        
    </div>
</div>

@endsection