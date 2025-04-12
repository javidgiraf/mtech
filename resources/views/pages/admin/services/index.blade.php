@extends('layouts.main')

@section('content')
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>{{ __('Services') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">{{ __('Services') }}</a></li>
                <li class="breadcrumb-item active">{{ __('View') }}</li>
            </ol>
        </nav>
    </div>
    @if(auth()->user()->can('Create Service') && empty($servicesCount))
    <div>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i></a>
    </div>
    @endif
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            @include('pages.admin.alerts.messages')
            <div class="card">
                <div class="card-body mt-4">

                    <table class="table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($services) > 0)
                            @foreach($services as $service)
                            <tr>
                                <th scope="row">{{ $services->firstItem() + $loop->index }}</th>
                                <td>{{ $service->title }}</td>
                                <td><img src="{{ $service->getImageUrl() }}" width="60px" height="60px"></td>
                                <td>
                                    @if(auth()->user()->can('Edit Service'))
                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    @endif
                                    @if(auth()->user()->can('Delete Service'))
                                    <a href="#" class="btn btn-danger btn-sm deleteServiceBtn"><i class="bi bi-trash"></i></a>
                                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" id="deleteServiceForm">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4">{{ __('No records available in table') }}</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot colspan="4">
                            {{ $services->links() }}
                        </tfoot>
                    </table>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.deleteServiceBtn', function() {
            
            swal({

                    title: "Are you sure?",
                    text: "You want to delete this service",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.querySelector('#deleteServiceForm').submit();
                    }

                });
        });
    });
</script>
@endpush