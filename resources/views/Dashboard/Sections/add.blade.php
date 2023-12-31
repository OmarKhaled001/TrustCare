<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/sections_trans.add_section')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Sections.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="name" class="label mb-2">{{trans('Dashboard/sections_trans.name_section')}}</label>
                    <input type="text" name="name" class="form-control">
                    <label for="description" class="label my-2">{{trans('Dashboard/sections_trans.description')}}</label>
                    <textarea name="description" class="form-control" ></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/sections_trans.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/sections_trans.add')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>