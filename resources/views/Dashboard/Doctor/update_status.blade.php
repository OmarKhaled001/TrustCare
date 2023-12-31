<!-- Modal -->
<div class="modal fade" id="update_status{{ $doctor->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ trans('Dashboard/doctor_trans.status_change') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update_status') }}" method="post" autocomplete="off">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="status">{{trans('Dashboard/doctor_trans.status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>{{trans('Dashboard/doctor_trans.status_chose')}}</option>
                            <option value="1">{{trans('Dashboard/doctor_trans.enabled')}}</option>
                            <option value="0">{{trans('Dashboard/doctor_trans.not_enabled')}}</option>
                        </select>
                    </div>

                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/sections_trans.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/doctor_trans.update')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>