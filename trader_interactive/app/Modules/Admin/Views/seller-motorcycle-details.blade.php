<html>
<head>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
</head>
<body>
<div class="row" style="margin-left: 250px">
    <a href="/admin/logout">Logout</a>
</div>
<div align="center">
    <h3>Seller MotorCycle Details</h3>
    <a href="/admin/dashboard">Back To Dashboard</a> //
    <a href="/admin/sellers">Back To Sellers</a> //
    <a href="/admin/seller-details/{{$SellerDetails->id}}">Back To Seller Details</a>
</div>

<div align="center" style="margin-top: 50px">
    @if(isset($SellerListingDetails)&& empty($SellerListingDetails))
        <p><strong>No Result Found</strong></p>
    @endif
</div>
<div style="margin-left: 200px">
    @if(isset($SellerListingDetails)&& !empty($SellerListingDetails))
        @foreach($SellerListingDetails as $data)
            <div class="row" style="margin-top:20px">
                <div class="col-lg-4">
                    <label><b>Make</b></label>
                </div>
                <div class="col-lg-4">
                    <p>{{ $data->make}}</p>
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-lg-4">
                    <label><b>Model</b></label>
                </div>
                <div class="col-lg-4">
                    <p>{{ $data->model}}</p>
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-lg-4">
                    <label><b>Actual Price</b></label>
                </div>
                <div class="col-lg-4">
                    <p>Rs {{ $data->price}}</p>
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-lg-4">
                    <label><b>Selling Price</b></label>
                </div>
                <div class="col-lg-4">
                    <p>Rs {{ $data->selling_price}}</p>
                </div>
            </div>
            <div class="row" style="margin-top:20px"><label>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</label>
            </div>
        @endforeach
    @endif
</div>
</body>
</html>
