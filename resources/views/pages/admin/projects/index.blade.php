@extends('layouts.main')

@section('content')
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>{{ __('Projects') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">{{ __('Projects') }}</a></li>
                <li class="breadcrumb-item active">{{ __('View') }}</li>
            </ol>
        </nav>
    </div>
    @if(auth()->user()->can('Create Project'))
    <div>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i></a>
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
                                <th scope="col">Sub Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Sector</th>
                                <th scope="col">Client</th>
                            
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($projects) > 0)
                            @foreach($projects as $project)
                            <tr>
                                <th scope="row">{{ $projects->firstItem() + $loop->index }}</th>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->sub_title }}</td>
                                <td><img src="{{ $project->getImageUrl() }}" width="60px" height="60px"></td>
                                <td>{{ $project->sector->title }}</td>
                                <td>{{ $project->client->client_name }}</td>
                                <td>
                                    @if(auth()->user()->can('Edit Project'))
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    @endif

                                    @if(auth()->user()->can('Delete Project'))
                                    <a href="#" class="btn btn-danger btn-sm deleteProjectBtn"><i class="bi bi-trash"></i></a>
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" id="deleteProjectForm">
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
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    {{ $projects->links() }}
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
        $(document).on('click', '.deleteProjectBtn', function() {

            swal({

                    title: "Are you sure?",
                    text: "You want to delete this project",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.querySelector('#deleteProjectForm').submit();
                    }

                });
        });
    });
</script>
@endpush