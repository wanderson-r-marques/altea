<?php
$lang = config('default_lang');
if (isset($cmsContent))
    $lang = $cmsContent->lang;
$lang = MiscHelper::getLang($lang);
$direction = MiscHelper::getLangDirection($lang);
$queryString = MiscHelper::getLangQueryStr();
?>
{!! APFrmErrHelp::showErrorsNotice($errors) !!}
<div class="form-body">	
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'lang') !!}">
        {!! Form::label('lang', 'Idioma', ['class' => 'bold']) !!}                    
        {!! Form::select('lang', ['' => 'Selecione o idioma']+$languages, $lang, array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'setLang(this.value)')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'lang') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'page_id') !!}">
        {!! Form::label('page_id', 'URL', ['class' => 'bold']) !!}                    
        {!! Form::select('page_id', ['' => 'Selecione a página']+$cmsPages, null, array('class'=>'form-control', 'id'=>'page_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'page_id') !!}                                       
    </div>    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'page_title') !!}">
        {!! Form::label('page_title', 'Título', ['class' => 'bold']) !!}                    
        {!! Form::text('page_title', null, array('class'=>'form-control', 'id'=>'page_title', 'placeholder'=>'Título', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'page_title') !!}                                       
    </div>    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'page_content') !!}">
        {!! Form::label('page_content', 'Conteúdo', ['class' => 'bold']) !!}                    
        {!! Form::textarea('page_content', null, array('class'=>'form-control', 'id'=>'page_content', 'placeholder'=>'Conteúdo')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'page_content') !!}                                       
    </div>
    <input type="file" name="image" id="image" style="display:none;" accept="image/*"/>
</div>
@push('scripts')
<script type="text/javascript">
    function setLang(lang) {
        window.location.href = "<?php echo url(Request::url()) . $queryString; ?>" + lang;
    }
</script>
@include('admin.shared.cms_form_tinyMCE', array($lang, $direction))
@endpush