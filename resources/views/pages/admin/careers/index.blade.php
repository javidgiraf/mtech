@extends('layouts.main')

@section('content')
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>{{ __('Careers') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.careers.index') }}">{{ __('Careers') }}</a></li>
                <li class="breadcrumb-item active">{{ __('View') }}</li>
            </ol>
        </nav>
    </div>
    @if(auth()->user()->can('Create Career'))
    <div>
        <a href="{{ route('admin.careers.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i></a>
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
                                <th scope="col">{{ __('Position') }}</th>
                                <th scope="col" width="20%">{{ __('Discipline') }}</th>
                                <th scope="col">{{ __('Job Type') }}</th>
                                <th scope="col">{{ __('Job Code') }}</th>
                                <th scope="col">{{ __('Location') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($careers) > 0)
                            @foreach($careers as $career)
                            <tr>
                                <th scope="row">{{ $careers->firstItem() + $loop->index }}</th>
                                <td>{{ $career->position }}</td>
                                <td>{{ $career->discipline }}</td>
                                <td>{{ $career->job_type }}</td>
                                <td>{{ $career->job_code }}</td>
                                <td>{{ $career->location }}</td>
                                <td>
                                    @if(auth()->user()->can('Edit Career'))
                                    <a href="{{ route('admin.careers.edit', $career->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    @endif
                                    @if(auth()->user()->can('Delete Career'))
                                    <a href="#" class="btn btn-danger btn-sm deleteCareerBtn"><i class="bi bi-trash"></i></a>
                                    <form action="{{ route('admin.careers.destroy', $career->id) }}" method="POST" id="deleteCareerForm">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="7">{{ __('No records available in table') }}</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot colspan="7">
                            {{ $careers->links() }}
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
        $(document).on('click', '.deleteCareerBtn', function() {
            
            swal({

                    title: "Are you sure?",
                    text: "You want to delete this career",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.querySelector('#deleteCareerForm').submit();
                    }

                });
        });
    });
</script>
@endpush