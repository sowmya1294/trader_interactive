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
    <h3>Listing Details</h3>
    <a href="/admin/dashboard">Back To Dashboard</a> //
    <a href="/admin/listings">Back To Listings</a>
</div>
<div align="center" style="margin-top: 50px">
    @if(isset($ListingDetails)&& empty($ListingDetails))
        <p><strong>No Result Found</strong></p>
    @endif
</div>
<div style="margin-left: 200px">
    @if(isset($ListingDetails)&& !empty($ListingDetails))
        <div class="row">
            <div class="col-lg-4">
                <label><b>Thumbnail 1</b></label>
            </div>
            <div class="col-lg-4">
                <img src="/storage/{{$ListingDetails->thumbnail_1}}" height="200px" width="200px">
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Thumbnail 2</b></label>
            </div>
            <div class="col-lg-4">
                <img src="/storage/{{$ListingDetails->thumbnail_2}}" height="200px" width="200px">
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Thumbnail 3</b></label>
            </div>
            <div class="col-lg-4">
                <img src="/storage/{{$ListingDetails->thumbnail_3}}" height="200px" width="200px">
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Make</b></label>
            </div>
            <div class="col-lg-4">
                <p>{{$ListingDetails->make}}</p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Model</b></label>
            </div>
            <div class="col-lg-4">
                <p>{{$ListingDetails->model}}</p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Year</b></label>
            </div>
            <div class="col-lg-4">
                <p>{{$ListingDetails->year}}</p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Description</b></label>
            </div>
            <div class="col-lg-4">
                <p>{{$ListingDetails->description}}</p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Price</b></label>
            </div>
            <div class="col-lg-4">
                <p>Rs {{$ListingDetails->price}}</p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Color</b></label>
            </div>
            <div class="col-lg-4">
                <p>{{$ListingDetails->colour}}</p>
            </div>
        </div>
    @endif
</div>
</body>
</html>
