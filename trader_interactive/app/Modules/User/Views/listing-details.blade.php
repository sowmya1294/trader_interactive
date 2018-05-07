<html>
<head>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
</head>
<body>
<div class="row" style="margin-left: 250px">
    <a href="/logout">Logout</a>
</div>
<div align="center">
    <h3>Listing Details</h3>
    <a href="/listings">Back To Listings</a>
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
                <img src="/storage/{{$ListingDetails[0]->thumbnail_1}}" height="200px" width="200px">
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Thumbnail 2</b></label>
            </div>
            <div class="col-lg-4">
                <img src="/storage/{{$ListingDetails[0]->thumbnail_2}}" height="200px" width="200px">
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Thumbnail 3</b></label>
            </div>
            <div class="col-lg-4">
                <img src="/storage/{{$ListingDetails[0]->thumbnail_3}}" height="200px" width="200px">
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Make</b></label>
            </div>
            <div class="col-lg-4">
                <p>{{$ListingDetails[0]->make}}</p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Model</b></label>
            </div>
            <div class="col-lg-4">
                <p>{{$ListingDetails[0]->model}}</p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Year</b></label>
            </div>
            <div class="col-lg-4">
                <p>{{$ListingDetails[0]->year}}</p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Description</b></label>
            </div>
            <div class="col-lg-4">
                <p>{{$ListingDetails[0]->description}}</p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Price</b></label>
            </div>
            <div class="col-lg-4">
                <p>Rs {{$ListingDetails[0]->price}}</p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-lg-4">
                <label><b>Color</b></label>
            </div>
            <div class="col-lg-4">
                <p>{{$ListingDetails[0]->colour}}</p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <label><b>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</b></label>
        </div>
        @foreach($ListingDetails as $data)
            <div class="row" style="margin-top:20px">
                <div class="col-lg-4">
                    <label><b>Seller </b></label>
                </div>
                <div class="col-lg-4">
                    <p>{{$data->name}}</p>
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-lg-4">
                    <label><b>Selling Price </b></label>
                </div>
                <div class="col-lg-4">
                    <p>{{$data->selling_price}}</p>
                </div>
                <div class="col-lg-4">
                    <a href="/enquiry/{{$data->seller_id}}">
                        <button class="btn btn success"> Enquiry</button>
                    </a>
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <label><b>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</b></label>
            </div>
        @endforeach
        <div class="row" style="margin-top:60px">
            <h3>Review Details</h3>
        </div>
        @foreach($ReviewDetails as $data)
            <div class="row" style="margin-top:20px">
                <div class="col-lg-4">
                    <label><b>Seller </b></label>
                </div>
                <div class="col-lg-4">
                    <p>{{$data->name}}</p>
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-lg-4">
                    <label><b>Review </b></label>
                </div>
                <div class="col-lg-4">
                    <p>{{$data->reviews}}</p>
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <label><b>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</b></label>
            </div>
        @endforeach
    @endif
</div>
</body>
</html>
