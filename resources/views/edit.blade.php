
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
    <h1>Edit Product</h1>
    <form method="post" action="{{route('editsanpham')}}">
        @csrf
        <div class="form-group">
            <lable>Product Name</lable>
            <input type="text" id="msv" name="tensp" value="{{$productdetailFind->tensp}}" class="form-control">
        </div>
        <div class="form-group">
            <lable>Type</lable>
            <select id="lop" name="tenloai" value="{{$productdetailFind->tenloai}}" class="form-control">
                <option name="">Gối</option>
                <option>Chăn</option>
                <option>Vỏ ga</option>
            </select>
        </div>
        <div class="form-group">
            <lable>Color</lable>
            <input type="Text" id="lop" name="mau" value="{{$productdetailFind->mau}}" class="form-control">
        </div>
        <div class="form-group">
            <lable>Material</lable>
            <select id="lop" name="chatlieu" value="{{$productdetailFind->chatlieu}}" class="form-control">
                <option name="">Cotton</option>
                <option>Fabric</option>
            </select>
        </div>
        <div class="form-group">
            <lable>Size</lable>
            <input type="text" id="msv" name="kichco" value="{{$productdetailFind->kichco}}" class="form-control">
        </div>
        <div class="form-group">
            <lable>Cost</lable>
            <input type="text" id="lop" name="gia" value="{{$productdetailFind->gia}}" class="form-control">
        </div>
        <div class="form-group">
            <lable>Quantity</lable>
            <input type="text" id="lop" name="soluong" value="{{$productdetailFind->soluong}}" class="form-control">
        </div>
        <div class="form-group">
            <lable>Image</lable>
            <input type="file" id="lop" name="anh" value="{{$productdetailFind->anh}}" class="form-control">
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</div>
</body>

</html>
