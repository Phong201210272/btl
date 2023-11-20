
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="icon" href="./banchangagoidem/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
@if (isset($errors) && $errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <h1>Create account</h1>
    <form method="post" action="{{route('register')}}" method="post">
        @csrf
        <div class="form-group">
            <input type="hidden" id="msv"  name="MaND" class="form-control">
        </div>
        <div class="form-group">
            <lable>Full Name</lable>
            <input type="text" id="msv" name="TenND" class="form-control">
        </div>
        <div class="form-group">
            <lable>Username</lable>
            <input type="text" id="hoten" name="Username" class="form-control">
        </div>
        <div class="form-group">
            <lable>Password</lable>
            <input type="text" id="lop" name="Password" class="form-control">
        </div>
        <div class="form-group">
            <lable>Confirm Password</lable>
            <input type="text" id="lop" name="CFPassword" class="form-control">
        </div>
        <div class="form-group">
            <lable>DOB</lable>
            <input type="date" id="lop" name="DOB" class="form-control">
        </div>
        <div class="form-group">
            <lable>Phone Number</lable>
            <input type="text" id="msv" name="SDT" class="form-control">
        </div>
        <div class="form-group">
            <lable>Email</lable>
            <input type="text" id="lop" name="Email" class="form-control">
        </div>
        <div class="form-group">
            <input type="radio" id="male" name="Gender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="Gender" value="female">
            <label for="female">Female</label><br>
            <input type="radio" id="other" name="Gender" value="other">
            <label for="other">Other</label><br><br>
        </div>
        <button class="btn btn-success">Add</button>
    </form>
</div>
</body>

</html>
