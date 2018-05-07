<html>
<head>
    <title>Home</title>
</head>
<body>
<div align="center">
    <h3>Welcome To Admin Panel</h3>
    <form action="/admin" method="post">
        <div class="row">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
        </div>
        <div class="row" style="margin-top: 20px">
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
        </div>
        <div class="row" style="margin-top: 20px">
            <button type="submit">Login</button>
        </div>
    </form>
</div>
</body>
</html>
