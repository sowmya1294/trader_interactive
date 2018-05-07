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
    <script type="text/javascript" language="javascript" src="../resources/demo.js"></script>
</head>
<body>
<div class="row" style="margin-left: 250px">
    <a href="/admin/logout">Logout</a>
</div>
<div align="center">
    <h3>Sellers</h3>
    <a href="/admin/dashboard">Back To Dashboard</a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Type Of Seller</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>Website</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($Sellers)&& !empty($Sellers))
    @foreach($Sellers as $data)
    <tr>
        <td>{{$data->type}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->address}}</td>
        <td>{{$data->phone}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->website}}</td>
        <td><a href="/admin/seller-details/{{$data->id}}">
            <button class="btn btn success"> View</button>
        </a></td>
    </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
    <tr>
        <th>Type Of Seller</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>Website</th>
        <th>Action</th>
    </tr>
    </tfoot>
</table>
</div>
</body>
</html>
<script>$(document).ready(function () {
    $('#example').DataTable();
});
</script>