@if($message = session()->get('success'))
<div class="col-4 ml-auto alert alert-success bg-success text-light border-0 alert-dismissible fade show alertMessage" role="alert">
    <i class="bi bi-check bi-check-lg lg me-2"></i>
    {{ $message }}
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if($message = session()->get('error'))
<div class="col-4 ml-auto justify-content-end alert alert-danger bg-danger text-light border-0 alert-dismissible fade show alertMessage" role="alert">
    {{ $message }}
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<script>
    setTimeout(() => {
        document.querySelector('.alertMessage').remove();
    }, 2000);
</script>