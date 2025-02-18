@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>Access Controls</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <!-- <li class="breadcrumb-item">Components</li> -->
            <li class="breadcrumb-item active">Access Controls</li>
        </ol>
    </nav>
    @include('pages.admin.alerts.messages')
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                @if(count($roles) > 0)
                <div class="card-body mt-4">
                    <form action="{{ route('admin.saveRole') }}" method="POST" id="roleForm">
                        @csrf
                        <div class="row mb-4">
                            @csrf
                            <div class="form-group col-10">
                                <input type="text" class="form-control" name="role" placeholder="Enter Role" id="role">
                                <span class="roleError"></span>
                            </div>
                            <div class="form-group col-2">
                                <button type="submit" class="btn btn-success">Save Role</button>
                            </div>

                        </div>
                    </form>

                    <div class="accordion mt-4" id="accordionExample">
                        @foreach ($roles as $key => $role)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $key+1 }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key+1 }}" aria-expanded="false" aria-controls="collapse{{ $key+1 }}">
                                    {{ $role->name }}
                                </button>
                            </h2>
                            <div id="collapse{{ $key+1 }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $key+1 }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form action="{{ route('admin.savePermissions') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="role" value="{{ $role->name }}">
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            @foreach($menus as $mkey => $menu)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading{{ $mkey+1 }}">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $mkey+1 }}" aria-expanded="false" aria-controls="flush-collapse{{ $mkey+1 }}">
                                                        <input type="checkbox"
                                                            {{ in_array(
                                                            strtolower($menu->id), 
                                                            array_map('strtolower', $role->permissions->pluck('menu_id')->toArray())
                                                            ) ? 'checked' : '' }}
                                                            data-key="{{ $mkey+1 }}"
                                                            class="allPermissions"> &nbsp; {{ $menu->name }}
                                                    </button>
                                                </h2>
                                                @foreach($menu->permissions as $pkey => $menuPermission)
                                                <div id="flush-collapse{{ $mkey+1 }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $pkey+1 }}" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <input type="checkbox"
                                                            {{ in_array(
                                                            strtolower($menuPermission->name), 
                                                            array_map('strtolower', $role->permissions->pluck('name')->toArray())
                                                            ) ? 'checked' : '' }}
                                                            data-key="{{ $mkey+1 }}"
                                                            name="menuPermissions[]"
                                                            class="menuPermissions{{ $mkey }}"
                                                            value="{{ strtolower($menuPermission->name) }}">
                                                        &nbsp; {{ $menuPermission->name }}
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-lg-12 d-flex justify-content-end">
                                            <a href=""></a>
                                            <button type="submit" class="btn btn-success">Save Permissions</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>
                @else
                <span class="card-footer bg-secondary text-white"><b>{{ __('No permissions found in table') }}</b></span>
                @endif
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    let checkAllPermissions = document.querySelector('.allPermissions');

    $(document).ready(function() {
        checkAllPermissions.addEventListener('click', () => {
            if ($(this).is(':checked') == true) {
                $('.accordion-button').removeAttr('collapse');
                $('.accordion-collapse').attr('show');
            } else {
                $('.accordion-button').attr('collapse');
                $('.accordion-collapse').removeAttr('show');
            }
        });

        $("#roleForm").submit(function(e){
            e.preventDefault();

            let url = $(this).attr('action');
            let method = $(this).attr('method');

            $("#role").removeClass('is-invalid');
            $(".roleError").removeClass('invalid-feedback').text('');

            $.ajax({
                url: url,
                type: method,
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error: function(error) {
                    $("#role").addClass('is-invalid');
                    $(".roleError").addClass('invalid-feedback').text(error.responseJSON.message);
                }
            });
        });
    });
</script>
@endpush