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
    <h3>Seller Details</h3>
    <a href="/admin/dashboard">Back To Dashboard</a> //
    <a href="/admin/sellers">Back To Sellers</a>
</div>
<div  class="row">
    <div class="col-lg-3">
        <h3>Truck Listings : {{count($SellerListingDetails1)}}</h3>
        <a href="/admin/seller-truck-details/{{$SellerDetails->id}}">Click here to view</a>
    </div>
    <div class="col-lg-3">
        <h3>Car Listings: {{count($SellerListingDetails2)}}</h3>
        <a href="/admin/seller-car-details/{{$SellerDetails->id}}">Click here to view</a>
    </div>
    <div class="col-lg-3">
        <h3>MotorCycle Listings : {{count($SellerListingDetails3)}}</h3>
        <a href="/admin/seller-motorcycle-details/{{$SellerDetails->id}}">Click here to view</a>
    </div>
    <div class="col-lg-3">
        <h3>RV Listings : {{count($SellerListingDetails4)}}</h3>
        <a href="/admin/seller-rv-details/{{$SellerDetails->id}}">Click here to view</a>
    </div>
</div>
</body>
</html>
