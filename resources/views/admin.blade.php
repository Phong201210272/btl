@extends('layout/layout')
@section('content')
                <!-- Page Heading -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="/create" class="btn btn-primary mb-2">Add Products</a>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Material</th>
                                    <th>Cost</th>
                                    <th>Detail ID</th>
                                    <th>Edit</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)
                                    <tr>
                                        <td>{{$item -> masp}}</td>
                                        <td>{{$item -> tensp}}</td>
                                        <td>{{$item -> tenloai}}</td>
                                        <td>{{$item -> mau}}</td>
                                        <td>{{$item -> kichco}}</td>
                                        <td>{{$item -> chatlieu}}</td>
                                        <td>{{$item -> gia}}</td>
                                        <td>{{$item -> machitiet}}</td>
                                        <td>
                                            <a href="/edit/{{$item->machitiet}}"class="btn btn-warning mb-2">Edit</a><br>

{{--                                            <form action="{{ route('xoa'), ['machitiet' => $item -> machitiet]}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}

{{--                                                <button type="submit">Delete Data</button>--}}
{{--                                            </form>--}}
                                            <a href="{{ route('xoa', ['machitiet' => $item->machitiet]) }}" class="btn btn-danger">Delete Data</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
@endsection
