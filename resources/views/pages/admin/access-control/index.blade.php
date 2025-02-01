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
                <div class="card-body">


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
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <input type="hidden" name="role" value="{{ $role->name }}">
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
                                                            value="{{ $menuPermission->name }}">
                                                        &nbsp; {{ $menuPermission->name }}
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-lg-12 d-flex justify-content-end">
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
    });
</script>
@endpush