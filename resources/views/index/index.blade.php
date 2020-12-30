<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1500px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height: auto;}
        }
    </style>
</head>
<body>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" id="root-url" value="{!! url('/') !!}">
<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4>John's Blog</h4>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#section1">{!! trans('messages.home_') !!}</a></li>
                <li><a href="{!! url('/product_list') !!}">{!! trans('messages.product.product') !!}</a></li>
                <li><a href="{!! url('/category_list') !!}">{!! trans('messages.category.cat') !!}</a></li>

                <li class="nav nav-pills nav-stacked">
                    <div class="col-sm-6 sidenav">
                        <i class="dropdown-toggle" type="" data-toggle="dropdown">
                            <a href="#">{!! trans('messages.resume.resume') !!}</a>
{{--                            <span class="caret"></span>--}}
                        </i>
                        <ul class="dropdown-content">
                            <li><a href="{!! url('/resume_list') !!}">{!! trans('messages.resume.resume') !!}</a></li>
                            <li><a href="{!! url('/exp_list') !!}">{!! trans('messages.resume.exp') !!}</a></li>
                            <li><a href="{!! url('/resume_list') !!}">{!! trans('messages.resume.resume') !!}</a></li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('locale/en') }}" >{!! trans('messages.home.en') !!}</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('locale/th') }}" >{!! trans('messages.home.th') !!}</a></li>
            </ul><br>


            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Blog..">
                <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
            </div>
        </div>
       @yield('content')
    </div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>
