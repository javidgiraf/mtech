@extends('layouts.main')

@section('content')
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>{{ __('Sectors') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sectors.index') }}">{{ __('Sectors') }}</a></li>
                <li class="breadcrumb-item active">{{ __('View') }}</li>
            </ol>
        </nav>
    </div>
    @if(auth()->user()->can('Create Sector'))
    <div>
        <a href="{{ route('admin.sectors.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i></a>
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
                                <th scope="col">SubTitle</th>
                                <th scope="col">Image</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($sectors) > 0)
                            @foreach($sectors as $sector)
                            <tr>
                                <th scope="row">{{ $sectors->firstItem() + $loop->index }}</th>
                                <td>{{ $sector->title }}</td>
                                <td>{{ $sector->sub_title }}</td>
                                <td><img src="{{ $sector->getImageUrl() }}" width="60px" height="60px"></td>
                                <td>
                                    @if(auth()->user()->can('Edit Sector'))
                                    <a href="{{ route('admin.sectors.edit', $sector->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    @endif

                                    @if(auth()->user()->can('Delete Sector'))
                                    <a href="#" class="btn btn-danger btn-sm deleteSectorBtn"><i class="bi bi-trash"></i></a>
                                    <form action="{{ route('admin.sectors.destroy', $sector->id) }}" method="POST" id="deleteSectorForm">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">{{ __('No records available in table') }}</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    {{ $sectors->links() }}
                                </td>
                            </tr>

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
        $(document).on('click', '.deleteSectorBtn', function() {

            swal({

                    title: "Are you sure?",
                    text: "You want to delete this blog",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.querySelector('#deleteSectorForm').submit();
                    }

                });
        });
    });
</script>
@endpush