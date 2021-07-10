<?php
$lang = config('default_lang');
if (isset($video))
    $lang = $video->lang;
$lang = MiscHelper::getLang($lang);
$direction = MiscHelper::getLangDirection($lang);
$queryString = MiscHelper::getLangQueryStr();
?>
{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">        
    {!! Form::hidden('id', null) !!}
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'lang') !!}" id="lang_div">
        {!! Form::select('lang', ['' => 'Selecione o idioma']+$languages, $lang, ['class'=>'form-control', 'id'=>'lang', 'onchange'=>'setLang(this.value);']) !!}
        {!! APFrmErrHelp::showErrors($errors, 'lang') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'video_title') !!}">
        {!! Form::label('video_title', 'Título do vídeo', ['class' => 'bold']) !!}
        {!! Form::text('video_title', null, array('class'=>'form-control', 'id'=>'video_title', 'placeholder'=>'Título do vídeo', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'video_title') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'video_text') !!}">
        {!! Form::label('video_text', 'Texto do vídeo', ['class' => 'bold']) !!}
        {!! Form::textarea('video_text', null, array('class'=>'form-control', 'id'=>'video_text', 'placeholder'=>'Texto do vídeo', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'video_text') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'video_link') !!}">
        {!! Form::label('video_link', 'Link do vídeo', ['class' => 'bold']) !!}
        {!! Form::text('video_link', null, array('class'=>'form-control', 'id'=>'video_link', 'placeholder'=>'Link do vídeo (embed)', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'video_link') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_default') !!}">
        {!! Form::label('is_default', 'É padrão?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_default_1 = 'checked="checked"';
            $is_default_2 = '';
            if (old('is_default', ((isset($video)) ? $video->is_default : 1)) == 0) {
                $is_default_1 = '';
                $is_default_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="default" name="is_default" type="radio" value="1" {{$is_default_1}} onchange="showHideVideoId();">
                {{__('Yes')}} </label>
            <label class="radio-inline">
                <input id="not_default" name="is_default" type="radio" value="0" {{$is_default_2}} onchange="showHideVideoId();">
                {{__('No')}} </label>
        </div>			
        {!! APFrmErrHelp::showErrors($errors, 'is_default') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'video_id') !!}" id="video_id_div">
        {!! Form::label('video_id', 'Default Video', ['class' => 'bold']) !!}                    
        {!! Form::select('video_id', ['' => 'Select Default Video']+$videos, null, array('class'=>'form-control', 'id'=>'video_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'video_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_active') !!}">
        {!! Form::label('is_active', 'Está ativo?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($video)) ? $video->is_active : 1)) == 0) {
                $is_active_1 = '';
                $is_active_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="active" name="is_active" type="radio" value="1" {{$is_active_1}}>
                {{__('Yes')}} </label>
            <label class="radio-inline">
                <input id="not_active" name="is_active" type="radio" value="0" {{$is_active_2}}>
                {{__('No')}} </label>
        </div>			
        {!! APFrmErrHelp::showErrors($errors, 'is_active') !!}
    </div>	
    <div class="form-actions">
        {!! Form::button('Salvar <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')) !!}
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    function setLang(lang) {
        window.location.href = "<?php echo url(Request::url()) . $queryString; ?>" + lang;
    }
    function showHideVideoId() {
        $('#video_id_div').hide();
        var is_default = $("input[name='is_default']:checked").val();
        if (is_default == 0) {
            $('#video_id_div').show();
        }
    }
    showHideVideoId();
</script>
@endpush