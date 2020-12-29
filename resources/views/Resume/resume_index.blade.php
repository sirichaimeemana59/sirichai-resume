@extends('index.home_index')
@section('content')
    <div class="col-sm-9">
        <div class="container mt-5">
            <h2 class="mb-4">{!! trans('messages.resume.add') !!}</h2>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal-addProduct">{!! trans('messages.resume.add') !!}</button>
            <br><br>
            <table class="table table-bordered data-table-cat">
                <thead>
                <tr>
                    <th>{!! trans('messages.no') !!}</th>
                    <th>{!! trans('messages.resume.head_th') !!}</th>
                    <th>{!! trans('messages.resume.detail_th') !!}</th>
                    {{--                    <th>{!! trans('messages.product.img') !!}</th>--}}
                    <th>{!! trans('messages.action') !!}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($resume as $key => $row)
                    <tr>
                        <td>{!! $key+1 !!}</td>
                        <td>{!! $row->{'head_'.Session::get('locale')}!!}</td>
                        <td>{!! $row->{'detail_'.Session::get('locale')}!!}</td>
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

    <!-- Modal Add resume-->
    <div class="modal fade" id="myModal-addProduct" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{!! trans('messages.resume.add') !!}</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model(null,array('url' => array('/resume_create'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

                    <div class="form-group">
                        <label for="name_th">{!! trans('messages.resume.head_th') !!} :</label>
                        <input type="text" name="head_th" class="form-control" id="name_th" placeholder="{!! trans('messages.resume.head_th') !!}" required>
                    </div>


                    <div class="form-group">
                        <label for="name_en">{!! trans('messages.resume.head_en') !!} :</label>
                        <input type="text" name="head_en" class="form-control" id="name_en" placeholder="{!! trans('messages.resume.head_en') !!}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">{!! trans('messages.resume.detail_th') !!} :</label>
                        <textarea name="detail_th" id="" class="form-control" cols="50" rows="10" placeholder="{!! trans('messages.resume.detail_th') !!}" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">{!! trans('messages.resume.detail_en') !!} :</label>
                        <textarea name="detail_en" id="" class="form-control" cols="50" rows="10" placeholder="{!! trans('messages.resume.detail_en') !!}" required></textarea>
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
                        <label for="img">{!! trans('messages.resume.img') !!} :</label>
                        <input type="file" name="img" class="form-control" id="img" placeholder="{!! trans('messages.resume.img') !!}" required>
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
    <!-- Modal Add resume-->

    <!-- Modal Edit resume-->
    <div class="modal fade" id="edit-store" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{!! trans('messages.resume.edit') !!}</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model(null,array('url' => array('/resume_update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="name_th">{!! trans('messages.resume.head_th') !!} :</label>
                        <input type="text" name="head_th" class="form-control" id="ed_head_th" placeholder="{!! trans('messages.resume.head_th') !!}" required>
                    </div>


                    <div class="form-group">
                        <label for="name_en">{!! trans('messages.resume.head_en') !!} :</label>
                        <input type="text" name="head_en" class="form-control" id="ed_head_en" placeholder="{!! trans('messages.resume.head_en') !!}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">{!! trans('messages.resume.detail_th') !!} :</label>
                        <textarea name="detail_th" id="ed_detail_th" class="form-control" cols="50" rows="10" placeholder="{!! trans('messages.resume.detail_th') !!}" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">{!! trans('messages.resume.detail_en') !!} :</label>
                        <textarea name="detail_en" id="ed_detail_en" class="form-control" cols="50" rows="10" placeholder="{!! trans('messages.resume.detail_en') !!}" required></textarea>
                    </div>


                    <div class="form-group">
                        <label for="cat">{!! trans('messages.category.cat') !!} :</label>
                        <select name="cat" id="" class="form-control ed_cat">
                            <option value="">{!! trans('messages.category.cat') !!}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="img">{!! trans('messages.resume.img') !!} :</label>
                        <input type="file" name="img" class="form-control" id="img" placeholder="{!! trans('messages.resume.img') !!}">
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
    <!-- Modal Edit resume-->

    <!-- Modal View resume-->
    <div class="modal fade" id="view-store" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{!! trans('messages.resume.view') !!}</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model(null,array('url' => array('/resume_update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="name_th">{!! trans('messages.resume.head_th') !!} :</label>
                        <input type="text" name="head_th" class="form-control" id="vw_head_th" placeholder="{!! trans('messages.resume.head_th') !!}" readonly>
                    </div>


                    <div class="form-group">
                        <label for="name_en">{!! trans('messages.resume.head_en') !!} :</label>
                        <input type="text" name="head_en" class="form-control" id="vw_head_en" placeholder="{!! trans('messages.resume.head_en') !!}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="price">{!! trans('messages.resume.detail_th') !!} :</label>
                        <textarea name="detail_th" id="vw_detail_th" class="form-control" cols="50" rows="10" placeholder="{!! trans('messages.resume.detail_th') !!}" readonly></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">{!! trans('messages.resume.detail_en') !!} :</label>
                        <textarea name="detail_en" id="vw_detail_en" class="form-control" cols="50" rows="10" placeholder="{!! trans('messages.resume.detail_en') !!}" readonly></textarea>
                    </div>


                    <div class="form-group">
                        <label for="cat">{!! trans('messages.category.cat') !!} :</label>
                        <select name="cat" id="" class="form-control ed_cat" readonly>
                            <option value="">{!! trans('messages.category.cat') !!}</option>
                        </select>
                    </div>

                    <img src="{!! asset('1608955156.png') !!}" alt="">

                    <div class="form-group">
                        <label for="name_en">{!! trans('messages.resume.file') !!} :</label>

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
    <!-- Modal View resume-->


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.data-table-cat').DataTable();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
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
                    url:$('#root-url').val()+'/resume/edit-data',
                    method : 'post',
                    dataType:'json',
                    data : ({'id':id}),
                    success:function(e){
                         //console.log(e.data.resume.head_th);
                        // $.each(e.data.resume, function (i,v) {
                        //     console.log(e.data.resume);
                            document.getElementById("ed_head_th").value = e.data.resume.head_th;
                            document.getElementById("ed_head_en").value = e.data.resume.head_en;
                            document.getElementById("ed_detail_th").value = e.data.resume.detail_th;
                            document.getElementById("ed_detail_en").value = e.data.resume.detail_en;
                            document.getElementById("id").value = e.data.resume.id;
                            {{--document.getElementById("ed_cat").value = v.name_cat_{!! Session::get('locale') !!};--}}
                            cat_id = e.data.resume.cat_id;
                        //});

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

            //    Edit-Data

            $('body').on('click','.view-store',function(){
                var id = $(this).data('id');
                var this_ = $(this);
                var cat_id = "";
                var file='';
                // console.log(id);
                // console.log('rr');
                $('#view-store').modal('show');
                // $('load-content').empty();
                // $('v-load').show();
                $.ajax({
                    url:$('#root-url').val()+'/resume/edit-data',
                    method : 'post',
                    dataType:'json',
                    data : ({'id':id}),
                    success:function(e){
                        //console.log(e.data.resume.head_th);
                        // $.each(e.data.resume, function (i,v) {
                        //     console.log(e.data.resume);
                        document.getElementById("vw_head_th").value = e.data.resume.head_th;
                        document.getElementById("vw_head_en").value = e.data.resume.head_en;
                        document.getElementById("vw_detail_th").value = e.data.resume.detail_th;
                        document.getElementById("vw_detail_en").value = e.data.resume.detail_en;
                            cat_id = e.data.resume.cat_id;

                        $.each(e.data.cat,function(i,v) {
                            if(cat_id == v.id){
                                this_.parents().find('.ed_cat').append("<option value='"+v.id+"' selected>"+v.name_{!! Session::get('locale') !!}+"</option>");
                            }
                            else{
                                this_.parents().find('.ed_cat').append("<option value='"+v.id+"'>"+v.name_{!! Session::get('locale') !!}+"</option>");
                            }
                        });

                        file ='<a href="public/img/'+e.data.resume.file+')"></a>';

                        console.log(file);

                    },error:function(){
                        console.log('error');
                    }
                })
            });



        });
    </script>
@endsection
