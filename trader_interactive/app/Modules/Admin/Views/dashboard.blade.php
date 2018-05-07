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
<div class="row">
    <div class="col-lg-4">
        <h3>Total No. of Listings : {{count($Listings)}}</h3>
        <a href="/admin/listings">Click here to view</a>
    </div>
    <div class="col-lg-4">
        <h3>Total No. of Sellers :{{count($Sellers)}}</h3>
        <a href="/admin/sellers">Click here to view</a>
    </div>
    <div class="col-lg-4">
        <h3>Total No. of Users : {{count($Users)}}</h3>
        <a href="/admin/users">Click here to view</a>
    </div>
</div>
</body>
</html>
<script>$(document).ready(function () {
        $('#example').DataTable();
    });</script>