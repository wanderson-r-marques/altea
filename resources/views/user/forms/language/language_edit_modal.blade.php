<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form" id="add_edit_profile_language" method="PUT" action="{{ route('update.front.profile.language', [$profileLanguage->id,$user->id]) }}">{{ csrf_field() }}
            <div class="modal-header">
            <h4 class="modal-title">{{__('Edit Language')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            @include('user.forms.language.language_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-large btn-primary" onClick="submitProfileLanguageForm();">{{__('Update Language')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
    <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->