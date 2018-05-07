<html>
<head>
    <title>Home</title>
</head>
<body>
<div align="center">
    <h3>Enquiry Form</h3>
    <form action="/contact" method="post">
        <div class="row">
            <div class="col-lg-4">
                <label for="email"><b>Contact Details</b></label>
            </div>
            <div class="col-lg-8">
                <textarea type="text" placeholder="Enter Contact Details" name="msg" rows="30px" cols="50px"
                          maxlength="250" required></textarea>
                <input type="hidden" value="{{$SellerDetails->email}}" name="email">
            </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
