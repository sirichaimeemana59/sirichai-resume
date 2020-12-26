@extends('index.index')
@section('content')
    <div class="col-sm-9">
        <div class="container mt-5">
            <h2 class="mb-4">{!! trans('messages.product.product') !!}</h2>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal-addProduct">{!! trans('messages.product.add_product') !!}</button>
            <br><br>
{{--            <img src="{!! asset('1608459709.png') !!}" alt="" width="500">--}}
{{--            <img src="./public/img/1608947718.png" alt="">--}}
            <table class="table table-bordered data-table-cat">
                <thead>
                <tr>
                    <th>{!! trans('messages.no') !!}</th>
                    <th>{!! trans('messages.product.name_th') !!}</th>
{{--                    <th>{!! trans('messages.product.img') !!}</th>--}}
                    <th>{!! trans('messages.action') !!}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $key => $row)
                    <tr>
                        <td>{!! $key+1 !!}</td>
                        <td>{!! $row->{'name_'.Session::get('locale')}!!}</td>
{{--                        <td><img src="{!! asset('1608947718.png') !!}" alt=""></td>--}}
                        <td>
                            <button class="btn btn-primary mt-2 mt-xl-0 text-right view-store" data-id="{!! $row->id !!}">{!! trans('messages.view') !!}</button>
                            <button class="btn btn-warning mt-2 mt-xl-0 text-right edit-store" data-id="{!! $row->id !!}">{!! trans('messages.edit') !!}</button>
                            <button class="btn btn-danger mt-2 mt-xl-0 text-right delete-store" data-id="{!! $row->id !!}">{!! trans('messages.del') !!}</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Add Product-->
    <div class="modal fade" id="myModal-addProduct" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{!! trans('messages.product.add_product') !!}</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model(null,array('url' => array('/create_product'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

                    <div class="form-group">
                        <label for="name_th">{!! trans('messages.category.name_th') !!} :</label>
                        <input type="text" name="name_th" class="form-control" id="name_th" placeholder="{!! trans('messages.category.name_th') !!}" required>
                    </div>


                    <div class="form-group">
                        <label for="name_en">{!! trans('messages.category.name_en') !!} :</label>
                        <input type="text" name="name_en" class="form-control" id="name_en" placeholder="{!! trans('messages.category.name_en') !!}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">{!! trans('messages.product.price') !!} :</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="{!! trans('messages.product.price') !!}" required>
                    </div>

                    <div class="form-group">
                        <label for="amount">{!! trans('messages.product.amount') !!} :</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="{!! trans('messages.product.amount') !!}" required>
                    </div>

                    <div class="form-group">
                        <label for="cat">{!! trans('messages.category.cat') !!} :</label>
                        <select name="cat" id="" class="form-control">
                            <option value="">{!! trans('messages.category.cat') !!}</option>
                       @foreach($cat as $key => $value)
                                <option value="{!! $value->id !!}">{!! $value->{'name_'.Session::get('locale')} !!}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="img">{!! trans('messages.product.img') !!} :</label>
                        <input type="file" name="img" class="form-control" id="img" placeholder="{!! trans('messages.product.img') !!}" required>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg pull-right">{!! trans('messages.add') !!}</button>
                        {{--                    <button type="button" class="btn btn-warning btn-lg">Register</button>--}}
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('messages.cancel') !!}</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal Add Product-->


    <!-- Modal View Product-->
    <div class="modal fade" id="view-store" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{!! trans('messages.product.view') !!}</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model(null,array('url' => array('/create_product'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

                    <div class="form-group">
                        <label for="name_th">{!! trans('messages.category.name_th') !!} :</label>
                        <input type="text" name="name_th" class="form-control" id="name_th_PD" placeholder="{!! trans('messages.category.name_th') !!}" readonly>
                    </div>


                    <div class="form-group">
                        <label for="name_en">{!! trans('messages.category.name_en') !!} :</label>
                        <input type="text" name="name_en" class="form-control" id="name_en_PD" placeholder="{!! trans('messages.category.name_en') !!}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="price">{!! trans('messages.product.price') !!} :</label>
                        <input type="text" name="price" class="form-control" id="price_PD" placeholder="{!! trans('messages.product.price') !!}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="amount">{!! trans('messages.product.amount') !!} :</label>
                        <input type="text" name="amount" class="form-control" id="amount_PD" placeholder="{!! trans('messages.product.amount') !!}" readonly>
                    </div>


                    <div class="form-group">
                        <label for="amount">{!! trans('messages.category.cat') !!} :</label>
                        <input type="text" name="cat_PD" class="form-control" id="cat_PD" placeholder="{!! trans('messages.category.cat') !!}" readonly>
                    </div>

                    {!! Form::close() !!}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('messages.cancel') !!}</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal View Product--->

    <!-- Modal Edit Product-->
    <div class="modal fade" id="edit-store" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{!! trans('messages.product.edit') !!}</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model(null,array('url' => array('/update_product'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="name_th">{!! trans('messages.category.name_th') !!} :</label>
                        <input type="text" name="name_th" class="form-control" id="ed_name_th" placeholder="{!! trans('messages.category.name_th') !!}" required>
                    </div>


                    <div class="form-group">
                        <label for="name_en">{!! trans('messages.category.name_en') !!} :</label>
                        <input type="text" name="name_en" class="form-control" id="ed_name_en" placeholder="{!! trans('messages.category.name_en') !!}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">{!! trans('messages.product.price') !!} :</label>
                        <input type="text" name="price" class="form-control" id="ed_price" placeholder="{!! trans('messages.product.price') !!}" required>
                    </div>

                    <div class="form-group">
                        <label for="amount">{!! trans('messages.product.amount') !!} :</label>
                        <input type="text" name="amount" class="form-control" id="ed_amount" placeholder="{!! trans('messages.product.amount') !!}" required>
                    </div>

                    <div class="form-group">
                        <label for="cat">{!! trans('messages.category.cat') !!} :</label>
                        <select name="cat" id="ed_cat" class="form-control ed_cat parent">
                            <option value="">{!! trans('messages.category.cat') !!}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="img">{!! trans('messages.product.img') !!} :</label>
                        <input type="file" name="img" class="form-control" id="img" placeholder="{!! trans('messages.product.img') !!}" required>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg pull-right">{!! trans('messages.add') !!}</button>
                        {{--                    <button type="button" class="btn btn-warning btn-lg">Register</button>--}}
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('messages.cancel') !!}</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal Edit Product-->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.data-table-cat').DataTable();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //    View-Data

            $('body').on('click','.view-store',function(){
                var id = $(this).data('id');
               // console.log(id);
                // console.log('rr');
                $('#view-store').modal('show');
                // $('load-content').empty();
                // $('v-load').show();
                 $.ajax({
                     url:$('#root-url').val()+'/product/list-view',
                     method : 'post',
                     dataType:'json',
                     data : ({'id':id}),
                     success:function(e){
                        // console.log(e);
                         $.each(e, function (i,v) {
                             document.getElementById("name_th_PD").value = v.name_th;
                             document.getElementById("name_en_PD").value = v.name_en;
                             document.getElementById("price_PD").value = v.price;
                             document.getElementById("amount_PD").value = v.amount;
                             document.getElementById("cat_PD").value = v.name_cat_{!! Session::get('locale') !!};

                             var img = [
                                 '<img src="asset('+ v.img +')" alt="" width="25%">'
                             ];
                             $('.img').append(img);
                         });
                     },error:function(){
                         console.log('error');
                     }
                 })
            });

            //    Edit-Data

            $('body').on('click','.edit-store',function(){
                var id = $(this).data('id');
                var this_ = $(this);
                var cat_id = "";
                // console.log(id);
                // console.log('rr');
                $('#edit-store').modal('show');
                // $('load-content').empty();
                // $('v-load').show();
                $.ajax({
                    url:$('#root-url').val()+'/product/edit-data',
                    method : 'post',
                    dataType:'json',
                    data : ({'id':id}),
                    success:function(e){
                        // console.log(e);
                        $.each(e.data.product, function (i,v) {
                            document.getElementById("ed_name_th").value = v.name_th;
                            document.getElementById("ed_name_en").value = v.name_en;
                            document.getElementById("ed_price").value = v.price;
                            document.getElementById("ed_amount").value = v.amount;
                            document.getElementById("id").value = v.id;
                            document.getElementById("ed_cat").value = v.name_cat_{!! Session::get('locale') !!};
                            cat_id = v.cat_id;
                        });

                        $.each(e.data.cat,function(i,v) {
                            if(cat_id == v.id){
                                this_.parents().find('.ed_cat').append("<option value='"+v.id+"' selected>"+v.name_{!! Session::get('locale') !!}+"</option>");
                            }
                            else{
                                this_.parents().find('.ed_cat').append("<option value='"+v.id+"'>"+v.name_{!! Session::get('locale') !!}+"</option>");
                            }
                        });

                    },error:function(){
                        console.log('error');
                    }
                })
            });

        } );

    </script>
@endsection
