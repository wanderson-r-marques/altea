{!! APFrmErrHelp::showErrorsNotice($errors) !!}
<div class="form-body">
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'seo_title') !!}">
        {!! Form::label('seo_title', 'TTítulo do SEO', ['class' => 'bold']) !!}                    
        {!! Form::text('seo_title', null, array('class'=>'form-control', 'id'=>'seo_title', 'placeholder'=>'Título do SEO')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'seo_title') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'seo_description') !!}">
        {!! Form::label('seo_description', 'Descriçãao do SEO', ['class' => 'bold']) !!}                    
        {!! Form::textarea('seo_description', null, array('class'=>'form-control', 'id'=>'seo_description', 'placeholder'=>'Descriçãao do SEO')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'seo_description') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'seo_keywords') !!}">
        {!! Form::label('seo_keywords', 'Palavras chaves do SEO', ['class' => 'bold']) !!}                    
        {!! Form::textarea('seo_keywords', null, array('class'=>'form-control', 'id'=>'seo_keywords', 'placeholder'=>'Palavras chaves do SEO')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'seo_keywords') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'seo_other') !!}">
        {!! Form::label('seo_other', 'Outras tags do SEO', ['class' => 'bold']) !!}                    
        {!! Form::textarea('seo_other', null, array('class'=>'form-control', 'id'=>'seo_other', 'placeholder'=>'Outras tags do SEO')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'seo_other') !!}                                       
    </div>
</div>