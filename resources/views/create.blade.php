
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
    <h1>Create Product</h1>
    <form method="post" action="{{route('addsanpham')}}">
        @csrf
        <div class="form-group">
            <lable>Id</lable>
            <input type="text" readonly id="msv" name="masp" value="{{$ma}}" class="form-control">
        </div>
        <div class="form-group">
            <lable>Name</lable>
            <input type="text" id="hoten" name="tensp" class="form-control">
        </div>
        <div class="form-group">
            <lable>Type</lable>
            <select id="lop" name="tenloai" class="form-control">
                <option name="">Gối</option>
                <option>Chăn</option>
                <option>Vỏ ga</option>
            </select>
        </div>
        <div class="form-group">
            <lable>Color</lable>
            <input type="Text" id="lop" name="mau" class="form-control">
        </div>
        <div class="form-group">
            <lable>Material</lable>
            <select id="lop" name="chatlieu" class="form-control">
                <option name="">Cotton</option>
                <option>Fabric</option>
            </select>
        </div>
        <div class="form-group">
            <lable>Size</lable>
            <input type="text" id="msv" name="kichco" class="form-control">
        </div>
        <div class="form-group">
            <lable>Cost</lable>
            <input type="text" id="lop" name="gia" class="form-control">
        </div>
        <div class="form-group">
            <lable>Quantity</lable>
            <input type="text" id="lop" name="soluong" class="form-control">
        </div>
        <div class="form-group">
            <lable>Detail Id</lable>
            <input type="text" id="lop" readonly value="{{$ma2}}" name="machitiet" class="form-control">
        </div>
        <div class="form-group">
            <lable>Image</lable>
            <input type="file" id="lop" name="anh" class="form-control">
        </div>
        <button class="btn btn-success">Add</button>
    </form>
</div>
</body>

</html>
