@extends('layouts.main')

@section('content')
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>{{ __('Clients') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.clients.index') }}">{{ __('Clients') }}</a></li>
                <li class="breadcrumb-item active">{{ __('View') }}</li>
            </ol>
        </nav>
    </div>
    @if(auth()->user()->can('Create Client'))
    <div>
        <a href="{{ route('admin.clients.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i></a>
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
                                <th scope="col">Client</th>
                                <th scope="col">Sector</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Website</th>
                                <th scope="col">Location</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($clients) > 0)
                            @foreach($clients as $client)
                            <tr>
                                <th scope="row">{{ $clients->firstItem() + $loop->index }}</th>
                                <td>{{ $client->client_name }}</td>
                                <td>{{ $client->sector->title }}</td>

                                <td><img src="{{ $client->getLogoUrl() }}" width="60px" height="60px"></td>
                                <td><a href="{{ $client->website }}" target="_blank">{{ $client->website }}</a></td>
                                <td>{{ $client->location }}</td>
                                <td>
                                    @if(auth()->user()->can('Edit Client'))
                                    <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    @endif

                                    @if(auth()->user()->can('Delete Client'))
                                    <a href="#" class="btn btn-danger btn-sm deleteClientBtn"><i class="bi bi-trash"></i></a>
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" id="deleteClientForm">
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
                                    {{ $clients->links() }}
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
        $(document).on('click', '.deleteClientBtn', function() {
            
            swal({

                    title: "Are you sure?",
                    text: "You want to delete this client",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.querySelector('#deleteClientForm').submit();
                    }

                });
        });
    });
</script>
@endpush