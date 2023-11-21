{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('user.destroy', $user->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Are you sure you want to delete {{ $user->name }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        <br>
        <button type="submit" class="btn btn-danger btn-sm">Yes, Yes, I am sure</button>
    </div>
</form>
