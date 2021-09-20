<div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false" id="toast">
    <div class="toast-header bg-danger">
      {{-- <img src="..." class="rounded mr-2" alt="..."> --}}
      <strong class="mr-auto">Notications</strong>
      <small></small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body text-danger" id="toast_body">

    </div>
</div>
<style>
    #toast{
        position: fixed;
        bottom: 10px;
        width: 100%;
        max-width: 550px;
    }

</style>
