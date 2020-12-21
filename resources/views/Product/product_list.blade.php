@extends('index.index')
@section('content')
    <div class="col-sm-9">
        <div class="container mt-5">
            <h2 class="mb-4">{!! trans('messages.product.product') !!}</h2>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal-addProduct">{!! trans('messages.product.add_product') !!}</button>
            <br><br>
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
{{--                        <td><img src="" alt=""></td>--}}
                        <td>
                            <button class="btn btn-primary mt-2 mt-xl-0 text-right view-store" data-id="{!! $row->id !!}">{!! trans('messages.view') !!}</button>
                            <a href="{!! url('employee/cat/edit/'.$row->id) !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right">{!! trans('messages.edit') !!}</button></a>
                            <button class="btn btn-danger mt-2 mt-xl-0 text-right delete-store" data-id="{!! $row->id !!}">{!! trans('messages.del') !!}</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Add Category-->
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
                        <input type="text" name="nampricee_en" class="form-control" id="price" placeholder="{!! trans('messages.product.price') !!}" required>
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
    <!-- Modal Add Category-->


    <!-- Modal View Product-->
    <div class="modal fade" id="view-store" role="dialog">
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
                        <input type="text" name="name_th" class="form-control" id="name_th_PD" placeholder="{!! trans('messages.category.name_th') !!}" readonly>
                    </div>


                    <div class="form-group">
                        <label for="name_en">{!! trans('messages.category.name_en') !!} :</label>
                        <input type="text" name="name_en" class="form-control" id="name_en_PD" placeholder="{!! trans('messages.category.name_en') !!}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="price">{!! trans('messages.product.price') !!} :</label>
                        <input type="text" name="nampricee_en" class="form-control" id="price" placeholder="{!! trans('messages.product.price') !!}" required>
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
    <!-- Modal View Product--->



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
                     dataType:'JSON',
                     data : ({'id':id}),
                     success:function(e){
                         document.getElementById("name_th_PD").value = e.name_th;
                         document.getElementById("name_en_PD").value = e.name_en;
                     },error:function(){
                         console.log('error');
                     }
                 })
            });

        } );

    </script>
@endsection
