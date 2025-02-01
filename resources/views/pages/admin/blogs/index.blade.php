@extends('layouts.main')

@section('content')
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>{{ __('Blogs') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">{{ __('Blogs') }}</a></li>
                <li class="breadcrumb-item active">{{ __('View') }}</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i></a>
    </div>
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
                            @if(count($blogs) > 0)
                            @foreach($blogs as $blog)
                            <tr>
                                <th scope="row">{{ $blogs->firstItem() + $loop->index }}</th>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->sub_title }}</td>
                                <td><img src="{{ $blog->getImageUrl() }}" width="60px" height="60px"></td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" data-url="{{ route('admin.blogs.destroy', $blog->id) }}" data-method="DELETE" id="deleteBlogBtn" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">{{ __('No records available in table') }}</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot colspan="5">
                            {{ $blogs->links() }}
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
    let deleteBlogBtn = document.querySelector('#deleteBlogBtn');
    deleteBlogBtn.addEventListener('click', () => {
        let url = this;
        console.log(url);
        let method = this.data('method');

        swal({

                title: "Are you sure?",
                text: "You want to delete this blog",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    fetch(url, {
                        type: method,
                        _token: "{{ csrf_token() }}"
                    })
                    .then((response) => {
                        setTimeout(() => {
                            toastr.success(response.message);
                        }, 2000);
                    });
                }

            });

    });
</script>
@endpush