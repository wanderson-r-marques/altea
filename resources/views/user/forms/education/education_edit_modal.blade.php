<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form" id="add_edit_profile_education" method="PUT" action="{{ route('update.front.profile.education', [$profileEducation->id,$user->id]) }}">{{ csrf_field() }}
            <div class="modal-header">
            <h4 class="modal-title">{{__('Edit Education')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            @include('user.forms.education.education_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-large btn-primary" onClick="submitProfileEducationForm();">{{__('Update Education')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
    <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->