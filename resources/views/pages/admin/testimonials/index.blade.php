@extends('layouts.main')

@section('content')
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>{{ __('Testimonials') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">{{ __('Testimonials') }}</a></li>
                <li class="breadcrumb-item active">{{ __('View') }}</li>
            </ol>
        </nav>
    </div>
    @if(auth()->user()->can('Create Testimonial'))
    <div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i></a>
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
                                <th scope="col">Author</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Company</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($testimonials) > 0)
                            @foreach($testimonials as $testimonial)
                            <tr>
                                <th scope="row">{{ $testimonials->firstItem() + $loop->index }}</th>
                                <td>{{ $testimonial->title }}</td>
                                <td>{{ $testimonial->author_name }}</td>
                                <td>{{ $testimonial->photo }}</td>
                                <td><img src="{{ $testimonial->getPhotoUrl() }}" width="60px" height="60px"></td>
                                <td>
                                    @if(auth()->user()->can('Edit Service'))
                                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    @endif
                                    @if(auth()->user()->can('Delete Service'))
                                    <a href="#" class="btn btn-danger btn-sm deleteTestimonialBtn"><i class="bi bi-trash"></i></a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" id="deleteTestimonialForm">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6">{{ __('No records available in table') }}</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot colspan="6">
                            {{ $testimonials->links() }}
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
        $(document).on('click', '.deleteTestimonialBtn', function() {
            
            swal({

                    title: "Are you sure?",
                    text: "You want to delete this testimonial",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.querySelector('#deleteTestimonialForm').submit();
                    }

                });
        });
    });
</script>
@endpush