@extends('layouts.app')

@section('content')
    </div>
        <div class="text-center" style="background-color: #B0E0E6;">
        <h2 class="section-heading text-uppercase">Choose a payment method</h2> <br><br>
        </div>


        <div class="row text-center" style="padding:50px; background-color: #B0E0E6;">
                        
                    <div class="col-md-7">
                    <a href="/payment1"><img src="/img/cr1.png" style="width:140px;height:140px;">
                        <h4 class="my-3" href="/payment1" target="_blank">Credit card </h4> </a>
                        
                    </div>
                    <div class="col-md-3">
                    <a href="/payment2"><img src="/img/cr2.png" style="width:140px;height:140px;"></a>
                    <h4 class="my-3" href="/payment2" target="_blank">Online banking</h4> </a>
                    <br><br>
                    <br><br>
                    </div>
                    

 @endsection