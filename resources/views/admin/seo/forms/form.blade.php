{!! APFrmErrHelp::showErrorsNotice($errors) !!}
<div class="form-body">
    <div class="form-group">
        <label class="bold">{{__('Page Name')}} : </label>
        <label class="bold" style="color:#06C;">{{ $seo->page_title }}</label>          
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'seo_title') !!}">
        {!! Form::label('seo_title', 'Título SEO', ['class' => 'bold']) !!}                    
        {!! Form::text('seo_title', null, array('class'=>'form-control', 'id'=>'seo_title', 'placeholder'=>'Título SEO')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'seo_title') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'seo_description') !!}">
        {!! Form::label('seo_description', 'Descrição SEO', ['class' => 'bold']) !!}                    
        {!! Form::textarea('seo_description', null, array('class'=>'form-control', 'id'=>'seo_description', 'placeholder'=>'Descrição SEO')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'seo_description') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'seo_keywords') !!}">
        {!! Form::label('seo_keywords', 'Palavras chaves SEO', ['class' => 'bold']) !!}                    
        {!! Form::textarea('seo_keywords', null, array('class'=>'form-control', 'id'=>'seo_keywords', 'placeholder'=>'Palavras chaves SEO')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'seo_keywords') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'seo_other') !!}">
        {!! Form::label('seo_other', 'Outras tags SEO', ['class' => 'bold']) !!}                    
        {!! Form::textarea('seo_other', null, array('class'=>'form-control', 'id'=>'seo_other', 'placeholder'=>'Outras tags SEO')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'seo_other') !!}                                       
    </div>
</div>