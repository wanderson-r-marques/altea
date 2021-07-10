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
                <li> <span>{{__('Testimonials')}}</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">{{__('Manage Testimonials')}} <small></small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">{{__('Testimonials')}}</span> </div>
                        <div class="actions"> <a href="{{ route('create.testimonial') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> {{__('Add New Testimonial')}}</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="testimonial-search-form">
                                <table class="table table-striped table-bordered table-hover"  id="testimonialDatatableAjax">
                                    <thead>
                                        <tr role="row" class="filter">
                                            <td>{!! Form::select('lang', ['' => 'Select Language']+$languages, config('default_lang'), array('id'=>'lang', 'class'=>'form-control')) !!}</td>
                                            <td><input type="text" class="form-control" name="testimonial_by" id="testimonial_by" autocomplete="off" placeholder="{{__('Testimonial By')}}"></td>
                                            <td><input type="text" class="form-control" name="testimonial" id="testimonial" autocomplete="off" placeholder="{{__('Testimonial')}}"></td>
                                            <td><select name="is_active" id="is_active"  class="form-control">
                                                    <option value="-1">{{__('Is Active?')}}</option>
                                                    <option value="1" selected="selected">{{__('Yes')}}</option>
                                                    <option value="0">{{__('No')}}</option>
                                                </select></td>
                                        </tr>
                                        <tr role="row" class="heading">
                                            <th>{{__('Language')}}</th>
                                            <th>{{__('Testimonial By')}}</th>
                                            <th>{{__('Testimonial')}}</th>
                                            <th>{{__('Actions')}}</th>
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
        var oTable = $('#testimonialDatatableAjax').DataTable({
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
                url: '{!! route('fetch.data.testimonials') !!}',
                data: function (d) {
                    d.lang = $('#lang').val();
                    d.testimonial_by = $('#testimonial_by').val();
                    d.testimonial = $('#testimonial').val();
                    d.is_active = $('#is_active').val();
                }
            }, columns: [
                {data: 'lang', name: 'lang'},
                {data: 'testimonial_by', name: 'testimonial_by'},
                {data: 'testimonial', name: 'testimonial'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        $('#testimonial-search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#lang').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#testimonial_by').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#testimonial').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#is_active').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
    });
    function deleteTestimonial(id, is_default) {
        var msg = 'Tem certeza que vai deletar?';
        if (is_default == 1) {
            msg = 'Tem certeza? Você irá excluir o Depoimento padrão, todos os outros Depoimentos não padrão serão excluídos também!';
        }
        if (confirm(msg)) {
            $.post("{{ route('delete.testimonial') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'}, null, 'text')
                    .done(function (response) {
                        if (response == 'ok')
                        {
                            var table = $('#testimonialDatatableAjax').DataTable();
                            table.row('testimonialDtRow' + id).remove().draw(false);
                        } else
                        {
                            alert('Falha na requisição!');
                        }
                    });
        }
    }
    function makeActive(id) {
        $.post("{{ route('make.active.testimonial') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#testimonialDatatableAjax').DataTable();
                        table.row('testimonialDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Falha na requisição!');
                    }
                });
    }
    function makeNotActive(id) {
        $.post("{{ route('make.not.active.testimonial') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#testimonialDatatableAjax').DataTable();
                        table.row('testimonialDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Falha na requisição!');
                    }
                });
    }
</script> 
@endpush 