@extends('admin.layouts.admin_layout')
@section('content')
<style type="text/css">
    .table td, .table th {
        font-size: 12px;
        line-height: 2.42857 !important;
    }	
</style>
<div class="page-content-wrapper"> 
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content"> 
        <!-- BEGIN PAGE HEADER--> 
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li> <a href="{{ route('admin.home') }}">{{__('Home')}}</a> <i class="fa fa-circle"></i> </li>
                <li> <span>{{__('Sliders')}}</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">{{__('Manage Sliders')}} <small></small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">{{__('Sliders')}}</span> </div>
                        <div class="actions"> <a href="{{ route('create.slider') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> {{__('Add New Slider')}}</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="slider-search-form">
                                <table class="table table-striped table-bordered table-hover"  id="sliderDatatableAjax">
                                    <thead>                                        
                                        <tr role="row" class="filter">
                                            <td>{!! Form::select('lang', ['' => 'Selecione o idioma']+$languages, config('default_lang'), array('id'=>'lang', 'class'=>'form-control')) !!}</td><td><input type="text" class="form-control" name="slider_heading" id="slider_heading" autocomplete="off" placeholder="Banner"></td><td><select name="is_active" id="is_active"  class="form-control"><option value="-1">{{__('Is Active?')}}</option><option value="1" selected="selected">{{__('Active')}}</option><option value="0">{{__('In Active')}}</option></select></td>
                                        </tr>
                                        <tr role="row" class="heading">
                                            <th>{{__('Language')}}</th><th>{{__('Slider')}}</th><th>{{__('Actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY --> 
</div>
@endsection
@push('scripts') 
<script>
    $(function () {
        var oTable = $('#sliderDatatableAjax').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            searching: false,
            /*		
             "order": [[1, "asc"]],            
             paging: true,
             info: true,
             */
            ajax: {
                url: '{!! route('fetch.data.sliders') !!}',
                data: function (d) {
                    d.lang = $('#lang').val();
                    d.slider_heading = $('#slider_heading').val();
                    d.is_active = $('#is_active').val();
                }
            }, columns: [
                {data: 'lang', name: 'lang'}, {data: 'slider_heading', name: 'slider_heading'}, {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        $('#slider-search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#lang').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#slider_heading').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#is_active').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
    });
    function deleteSlider(id, is_default) {
        var msg = 'Tem certeza?';
        if (is_default == 1) {
            msg = 'Tem certeza? Você irá deletar o Banner padrão, todos os outros Banners não padrão serão deletados também!';
        }
        if (confirm(msg)) {
            $.post("{{ route('delete.slider') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'}, null, 'text')
                    .done(function (response) {
                        if (response == 'ok')
                        {
                            var table = $('#sliderDatatableAjax').DataTable();
                            table.row('sliderDtRow' + id).remove().draw(false);
                        } else
                        {
                            alert('Falha na requisição!');
                        }
                    });
        }
    }
    function makeActive(id) {
        $.post("{{ route('make.active.slider') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#sliderDatatableAjax').DataTable();
                        table.row('sliderDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Falha na requisição!');
                    }
                });
    }
    function makeNotActive(id) {
        $.post("{{ route('make.not.active.slider') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#sliderDatatableAjax').DataTable();
                        table.row('sliderDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Falha na requisição!');
                    }
                });
    }
</script> 
@endpush
