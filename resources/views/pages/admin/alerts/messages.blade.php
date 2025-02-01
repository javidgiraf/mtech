@if($message = session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show alertMessage" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if($message = session()->get('error'))
    <div class="alert alert-danger alert-dismissible fade show alertMessage" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    setTimeout(() => {
        document.querySelector('.alertMessage').remove();
    }, 2000);
</script>