@extends('layouts.main')

@section('content')
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>{{ __('Products') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">{{ __('Products') }}</a></li>
                <li class="breadcrumb-item active">{{ __('View') }}</li>
            </ol>
        </nav>
    </div>
    @if(auth()->user()->can('Create Product'))
    <div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i></a>
    </div>
    @endif
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            @include('pages.admin.alerts.messages')
            <div class="card">
                <div class="card-body mt-4">

                    <table id="products" class="table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Sub Title</th>
                                <th scope="col">Image</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($products) > 0)
                            @foreach($products as $product)
                            <tr>
                                <th scope="row">{{ $products->firstItem() + $loop->index }}</th>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->sub_title }}</td>
                                <td><img src="{{ $product->getImageUrl() }}" width="60px" height="60px"></td>
                            
                                <td>
                                    @if(auth()->user()->can('Edit Product'))
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    @endif

                                    @if(auth()->user()->can('Delete Product'))
                                    <a href="#" class="btn btn-danger btn-sm deleteProductBtn"><i class="bi bi-trash"></i></a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" id="deleteProductForm">
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
                                    {{ $products->links() }}
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
        $(document).on('click', '.deleteProductBtn', function() {

            swal({

                    title: "Are you sure?",
                    text: "You want to delete this product",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.querySelector('#deleteProductForm').submit();
                    }

                });
        });
    });
</script>
@endpush