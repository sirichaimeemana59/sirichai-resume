@extends('index.index')
@section('content')
    <div class="col-sm-9">
<div class="container mt-5">
    <h2 class="mb-4">{!! trans('messages.category.cat') !!}</h2>
    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal-addcat">{!! trans('messages.category.add_cat') !!}</button>
    <br><br>
    <table class="table table-bordered data-table-cat">
        <thead>
        <tr>
            <th>{!! trans('messages.no') !!}</th>
            <th>{!! trans('messages.category.name_th') !!}</th>
            <th>{!! trans('messages.action') !!}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cat as $key => $value)
            <tr>
                <td>{!! $key+1 !!}</td>
                <td>{!! $value->{'name_'.Session::get('locale')}!!}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    </div>

    <!-- Modal Add Category-->
    <div class="modal fade" id="myModal-addcat" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{!! trans('messages.category.add_cat') !!}</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model(null,array('url' => array('/create_category'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

                    <div class="form-group">
                        <label for="name_th">{!! trans('messages.category.name_th') !!} :</label>
                        <input type="text" name="name_th" class="form-control" id="name_th" placeholder="{!! trans('messages.category.name_th') !!}" required>
                    </div>


                    <div class="form-group">
                        <label for="name_en">{!! trans('messages.category.name_en') !!} :</label>
                        <input type="text" name="name_en" class="form-control" id="name_en" placeholder="{!! trans('messages.category.name_en') !!}" required>
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.data-table-cat').DataTable();
    } );

</script>
@endsection
