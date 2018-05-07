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
    <h3>Users</h3>
    <a href="/admin/dashboard">Back To Dashboard</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email Address</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($Users)&& !empty($Users))
            @foreach($Users as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->email}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email Address</th>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>