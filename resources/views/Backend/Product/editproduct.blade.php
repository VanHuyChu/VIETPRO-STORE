@extends('Backend.Master.master')
@section('title', 'Chỉnh sửa sản phẩm')
@section('product_edit')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Sửa sản phẩm</div>
                    <div class="panel-body">
                        <form action="{{ route('product.editPost',['id'=> $product['prd_id']]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-bottom:40px">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select class="form-control" name="cat_id">
                                            {!! getCategories($categoriesData, 0, '', $product['cat_id']) !!}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        <input type="text" name="code" class="form-control"
                                            value="{{ $product->prd_code }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $product->prd_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm (Giá chung)</label>
                                        <input type="number" name="price" class="form-control"
                                            value="{{ $product->prd_price }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Sản phẩm có nổi bật</label>
                                        <select name="featured" class="form-control">
                                            <option @if ($product->prd_featured == 1)
                                                selected @endif
                                                value="1">Có</option>
                                            <option @if ($product->prd_featured == 0)
                                                selected @endif
                                                value="0">Không</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="state" class="form-control">
                                            <option @if ($product->prd_state == 1) selected
                                                @endif value="1">Còn hàng</option>
                                            <option @if ($product->prd_state == 0) selected
                                                @endif value="0">Hết hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        <input id="img" type="file"  name="img" class="form-control hidden"
                                            onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="100%" height="350px"
                                            src="img/product/{{ $product->prd_image }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Thông tin</label>
                                        <textarea name="info"
                                            style="width: 100%;height: 100px;">{{ $product->prd_info }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor" name="describe"
                                            style="width: 100%;height: 100px;">{{ $product->prd_describer }}</textarea>
                                    </div>
                                    <button class="btn btn-success" name="add-product" type="submit">Sửa sản phẩm</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>

    <!--end main-->
    @section('script')
    @parent
    {{-- <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script> --}}
    <script>
        $(document).ready(function() {
            $(".mul-select").select2({
                placeholder: "Chon danh muc", //placeholder
                tags: true,
                tokenSeparators: ['/', ',', ';', " "]
            });
        })

    </script>
    <script>
        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function() {
                $('#img').click();
            });
        });

    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@endsection
@endsection
