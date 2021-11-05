<div class="modal fade" id="deleteModal-{{$key}}" tabindex="-1" aria-labelledby="deleteModal-{{$key}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal-{{$key}}">{{ __('DELETE') }} {{ $name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ __('Are you sure ?') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('CLOSE') }}</button>
        <form action="{{ $destroyLink }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">
            {{ __('DELETE') }}
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
