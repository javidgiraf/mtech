@extends('layouts.main')

@section('content')
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>{{ __('Faqs') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.faqs.index') }}">{{ __('Faqs') }}</a></li>
                <li class="breadcrumb-item active">{{ __('View') }}</li>
            </ol>
        </nav>
    </div>
    @if(auth()->user()->can('Create Faq'))
    <div>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i></a>
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
                                <th scope="col">Question</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($faqs) > 0)
                            @foreach($faqs as $faq)
                            <tr>
                                <th scope="row">{{ $faqs->firstItem() + $loop->index }}</th>
                                <td>{{ $faq->question }}</td>
                                <td>
                                    @if(auth()->user()->can('Edit Faq'))
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    @endif
                                    @if(auth()->user()->can('Delete Faq'))
                                    <a href="#" class="btn btn-danger btn-sm deleteFaqBtn"><i class="bi bi-trash"></i></a>
                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" id="deleteFaqForm">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3">{{ __('No records available in table') }}</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot colspan="3">
                            {{ $faqs->links() }}
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
        $(document).on('click', '.deleteFaqBtn', function() {
            
            swal({

                    title: "Are you sure?",
                    text: "You want to delete this Faq",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.querySelector('#deleteFaqForm').submit();
                    }

                });
        });
    });
</script>
@endpush