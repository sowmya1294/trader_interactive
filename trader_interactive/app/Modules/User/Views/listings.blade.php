<html>
<head>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<div class="row" style="margin-left: 250px">
    <a href="/logout">Logout</a>
</div>
<div align="center">
    <h3>Listings</h3>
    <form action="/listings" method="post" style="margin-left: 400px">
        <div class="row">
            <label ><b>Select Type</b></label>
            <select name="make" required>
                <option value="Truck">Truck</option>
                <option value="MotorCycle">MotorCycle</option>
                <option value="Car">Car</option>
                <option value="RV">RV</option>
            </select>
        </div>
        <div class="row" style="margin-top: 20px">
            <label><b>Model</b></label>
            <input type="model" placeholder="Enter Model" name="model" required>
        </div>
        <div class="row" style="margin-top: 20px">
            <label ><b>MIN Price </b></label>
            <input type="number" placeholder="Enter MIN Price" name="min_price" required>
        </div>
        <div class="row" style="margin-top: 20px">
            <label ><b>MAX Price </b></label>
            <input type="number" placeholder="Enter MAX Price" name="max_price" required>
        </div>
        <div class="row" style="margin-top: 20px">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

<div align="center">
    <h3>Listings</h3>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Thumbnail</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($Listings)&& !empty($Listings))
            @foreach($Listings as $data)
                <tr>
                    <td><a href="/listing-details/{{$data->id}}"><img src="/storage/{{$data->thumbnail_1}}" height="50px" width="50px"></a></td>
                    <td><a href="/listing-details/{{$data->id}}">{{$data->make}}</a></td>
                    <td><a href="/listing-details/{{$data->id}}">{{$data->model}}</a></td>
                    <td><a href="/listing-details/{{$data->id}}">{{$data->year}}</a></td>
                    <td><a href="/listing-details/{{$data->id}}">{{$data->price}}</a></td>
                    <td><a href="/listing-details/{{$data->id}}">
                            <button class="btn btn success"> View</button>
                        </a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr>
            <th>Thumbnail</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
