@extends('layouts.app')

@section('content')

   <!-- Services-->
   <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><strong>Our Services</strong></h2>
                    <h3 class="section-subheading text-muted"><strong>Be a part of the change!</strong></h3>
                </div>

                <br><br>
                <div class="row text-center">
                    <div class="col-md-4">
                    <a href="/financial"><img src="/img/fin.png" alt="donate" style="width:140px;height:140px;">
                        <h4 class="my-3" href="/financial" target="_blank">Financial Donation</h4> </a>
                        <p class="text-muted">Your donation will be 100% given to local charities. Safe and Fast!

                        </p>
                    </div>
                    <div class="col-md-4">
                    <a href="{{ route('items.showPage')  }}"><img src="/img/drop.png" alt="donate" style="width:140px;height:140px;"></a>
                        <h4 class="my-3">Item Donation</h4>
                        <p class="text-muted">Got extra item that you don't need? Post the item here and donate it to those who need it the most!</p>
                    </div>
                    <div class="col-md-4">
                    <a href="{{ route('posts.showPage')  }}"><img src="/img/comm.png" alt="donate" style="width:140px;height:140px;"></a>
                        <h4 class="my-3">Community</h4>
                        <p class="text-muted">Connect with those around you and see what do they need the most!</p>
                        <br><br>
                        <br><br>
                    </div>

                </div>
            </div>
            </div>

</div>
</body>
</html>
        </section>
@endsection
