@extends('e-commerce.admin.layout.main')
@push('title')
    <title>Jewellery Artistic</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        div.dataTables_filter {
            display: none;
        }
    </style>
@endpush
@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        navitemsactiveness('product')
        navitemvisibility('nv-store')
    </script>
    <script>
        // document.addEventListener("DOMContentLoaded", function () {
        //   var options = {
        //     valueNames: ["product", "price", "category", "tags", "vendor", "time"]
        //   };

        //   var productList = new List("products", options);
        // });
    </script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetch_products(productsType) {
                let url = '';
                switch (productsType) {
                    case 'publish':
                        url = '{{ route('admin.products.index', ['productType' => 'publish']) }}';
                        break;

                    case 'draft':
                        url = '{{ route('admin.products.index', ['productType' => 'draft']) }}';
                        break;

                    default:
                        url = '{{ route('admin.products.index', ['productType' => 'all']) }}';
                        break;
                }
                if ($.fn.DataTable.isDataTable('#product-table')) {
                    $('#product-table').DataTable().clear().destroy();
                }
                var table = $('#product-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: url,
                    columns: [
                        // { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
                        {
                            data: 'image',
                            name: 'image',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'product',
                            name: 'title'
                        }, // "title" DB ka column
                        {
                            data: 'price',
                            name: 'price'
                        },
                        {
                            data: 'category',
                            name: 'category'
                        },
                        {
                            data: 'tags',
                            name: 'tag'
                        },
                        // { data: 'star', name: 'star', orderable: false, searchable: false },
                        {
                            data: 'published_on',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],
                    // Default length select ko hide karke apna label lagao
                    dom: '<"top"l>frtip', // "l" = lengthMenu ka div
                    language: {
                        lengthMenu: `
              
                  Show
                  <select id="custom-length" class="form-select m-2 rounded" style="width:2rem;display:inline-block;">
                      <option class="bg-body-highlight" value="10">10</option>
                      <option class="bg-body-highlight" value="25">25</option>
                      <option class="bg-body-highlight" value="50">50</option>
                      <option class="bg-body-highlight" value="100">100</option>
                  </select>
                  entries
                  
                  `,
                        paginate: {
                            previous: '<span class="fas fa-chevron-left"></span>',
                            next: '<span class="fas fa-chevron-right"></span>'
                        }
                    },

                    pageLength: 10,
                    pagingType: "simple",

                    initComplete: function() {
                        $('#custom-length').on('change', function() {
                            $('#products-table').DataTable().page.len($(this).val()).draw();
                        });
                    }
                });
                $('#customSearch').on('keyup', function() {
                    table.search(this.value).draw();
                });
            }
            let productTypenavlink = document.querySelectorAll('.productTypes');
            productTypenavlink.forEach(element => {
                element.addEventListener('click', (e) => {
                    productTypenavlink.forEach(el => el.classList.remove('active'));
                    e.currentTarget.classList.add('active');
                    let firstChildText = e.currentTarget.firstElementChild.textContent.trim();
                    switch (firstChildText) {
                        case "Published":
                            fetch_products('publish')
                            break;
                        case "Drafts":
                            fetch_products('draft')
                            break;

                        default:
                            fetch_products()
                            break;
                    }
                })
            });
            fetch_products()

        });
    </script>
@endpush
@section('main-content')
    <div class="content">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#!">Store</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
        @if (isset($msg1))
            <div class="alert alert-outline-success d-flex align-items-center mt-3" role="alert">
                <span class="fas fa-check-circle text-success fs-5 me-3"></span>
                <p class="mb-0 flex-1">{{ $msg1 }}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (isset($msg2))
            <div class="alert alert-outline-danger d-flex align-items-center mt-3" role="alert">
                <span class="fas fa-times-circle text-danger fs-5 me-3"></span>
                <p class="mb-0 flex-1">{{ $msg2 }}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Products</h2>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item"><a class="nav-link productTypes active" aria-current="page" href="#"><span>All
                        </span><span class="text-body-tertiary fw-semibold">(68817)</span></a></li>
                <li class="nav-item"><a class="nav-link productTypes" href="#"><span>Published </span><span
                            class="text-body-tertiary fw-semibold">(70348)</span></a></li>
                <li class="nav-item"><a class="nav-link productTypes" href="#"><span>Drafts </span><span
                            class="text-body-tertiary fw-semibold">(17)</span></a></li>
                <li class="nav-item"><a class="nav-link productTypes" href="#"><span>On discount </span><span
                            class="text-body-tertiary fw-semibold">(810)</span></a></li>
            </ul>
            <div id="products"
                data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="search-box">
                            <form class="position-relative"><input class="form-control search-input search"
                                    id="customSearch" type="search" placeholder="Search products" aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                        <div class="scrollbar overflow-hidden-y">
                            <div class="btn-group position-static" role="group">
                                <div class="btn-group position-static text-nowrap"><button
                                        class="btn btn-phoenix-secondary px-7 flex-shrink-0" type="button"
                                        data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                        aria-expanded="false" data-bs-reference="parent"> Category<span
                                            class="fas fa-angle-down ms-2"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group position-static text-nowrap"><button
                                        class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0" type="button"
                                        data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                        aria-expanded="false" data-bs-reference="parent"> Vendor<span
                                            class="fas fa-angle-down ms-2"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                </div><button class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0">More
                                    filters</button>
                            </div>
                        </div>
                        <div class="ms-xxl-auto"><button class="btn btn-link text-body me-4 px-0"><span
                                    class="fa-solid fa-file-export fs-9 me-2"></span>Export</button><a
                                href="{{ route('add-product') }}"><button class="btn btn-phoenix-primary me-1 mb-1"
                                    type="button"><span class="me-2" data-feather="plus"
                                        style="height:14.8px;width:14.8px;"></span>Add product</button></a></div>
                    </div>
                </div>
                <div
                    class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
                    <div class="table-responsive scrollbar mx-n1 px-1">
                        <table id="product-table" class="table fs-9 mb-0">
                            <thead>
                                <tr>
                                    {{-- <th></th> --}}
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    {{-- <th>Star</th> --}}
                                    <th>Published On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
