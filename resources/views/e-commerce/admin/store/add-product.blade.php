@extends('e-commerce.admin.layout.main')
@push('title')
    <title>Jewellery Artistic</title>
@endpush
@push('style')
    <link href="{{ asset('/vendors/dropzone/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendors/choices/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
@endpush
@push('script')
    <script src="{{ asset('/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/vendors/choices/choices.min.js') }}"></script>
    <script src="{{ asset('/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('/vendors/dropzone/dropzone-min.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;
        // decide form destination
        function form_Destination(submittype) {
            let form_URL = document.querySelector('.form');
            if ('publish' === submittype) {
                form_URL.setAttribute('action', "{{ route('add-product') }}")
            } else if ('draft' === submittype) {
                form_URL.setAttribute('action', "{{ route('draft-product') }}")
            } else if ('discard' === submittype) {
                form_URL.setAttribute('action', "{{ route('discard-product') }}")
            }
        }

        // highlight selected nav item 
        navitemsactiveness('add-product')
        navitemvisibility('nv-store')

        Dropzone.autoDiscover = false;

        const BASE_URL = "{{ url('/') }}";
        const existingImages = @json($images)??null;
        const productId = {{ $id }};

        const dz = new Dropzone("#customDropzone", {
            url: "{{ route('add-porduct-pics') }}",
            paramName: "image",
            maxFilesize: 5,
            maxFiles: 5,
            uploadMultiple: false,
            parallelUploads: 5,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            previewsContainer: "#dzPreviewContainer",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },

            previewTemplate: `
    <div class="container d-flex mb-3 pb-3 border-bottom border-translucent media">
      <div class="border p-2 col-2 rounded-2 me-2">
        <img class="rounded-2 dz-image" data-dz-thumbnail/>
      </div>
      <div class="flex-1 d-flex flex-between-center">
        <div>
          <h6 data-dz-name class="ms-4"></h6>
          <span class="fs-10 text-danger" data-dz-errormessage></span>
        </div>
        <div class="dropdown">
          <button class="btn btn-link text-body-tertiary btn-sm dropdown-toggle btn-reveal dropdown-caret-none"
            type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fas fa-ellipsis-h"></span>
          </button>
          <div class="dropdown-menu dropdown-menu-end border border-translucent py-2">
            <a class="dropdown-item" href="#" data-dz-remove>Remove File</a>
          </div>
        </div>
      </div>
    </div>
  `,

            init: function() {
                const dropzone = this;

                // preload images exists
                if (Array.isArray(existingImages) && existingImages.length > 0) {
                    existingImages.forEach(img => {
                        const imageUrl = `${BASE_URL}/images/${img.img_path}`;

                        const mockFile = {
                            name: img.img_path,
                            size: 12345,
                            serverId: img.id,
                            accepted: true,
                            status: Dropzone.SUCCESS
                        };

                        dropzone.emit("addedfile", mockFile);
                        dropzone.emit("thumbnail", mockFile, imageUrl);
                        dropzone.emit("success", mockFile, {});
                        dropzone.emit("complete", mockFile);

                        dropzone.files.push(mockFile);

                        // remove button works for preloaded images
                        setTimeout(() => {
                            const removeBtn = mockFile.previewElement?.querySelector(
                                "[data-dz-remove]");
                            if (removeBtn) {
                                removeBtn.addEventListener("click", (e) => {
                                    e.preventDefault();
                                    e.stopPropagation();
                                    dropzone.removeFile(
                                    mockFile); // triggers “removedfile”
                                });
                            }
                        }, 300);
                    });
                }

                dropzone.on("sending", function(file, xhr, formData) {
                    formData.append("product_id", productId);
                });

                dropzone.on("removedfile", function(file) {
                    if (!file.serverId && file.name) {
                        const matched = existingImages.find(i => i.img_path === file.name);
                        if (matched) file.serverId = matched.id;
                    }
                    if (file.serverId) {
                        fetch(`/admin/store/product-image/${file.serverId}`, {
                                method: "DELETE",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                }
                            })
                            .then(res => res.json())
                            .then(data => console.log("Deleted:", data))
                            .catch(err => console.error("Error deleting image:", err));
                    } else {
                        console.log("No serverId found for:", file);
                    }
                });
            },

            success: function(file, response) {
                file.serverId = response.image_id;
            }
        });



        document.addEventListener("DOMContentLoaded", function() {
            // dynamically product attribute fetch
            function attrubuteSet(attrubuteclass) {
                let selectedAttValue = "";
                switch (attrubuteclass) {
                    case "category":
                    selectedAttValue = "{{$product->category}}";
                    break;
                    case "material-type":
                    selectedAttValue = "{{$product->material_type}}";
                    
                    break;
                    case "occasion":
                    selectedAttValue = "{{$product->occasion}}";
                    
                    break;
                    case "gemstone":
                    selectedAttValue = "{{$product->gemstone}}";
                    
                    break;
                    case "style":
                    selectedAttValue = "{{$product->style}}";
                    
                    break;
                    case "color":
                    selectedAttValue = "{{$product->color}}";
                    
                    break;
                    case "tags":
                    selectedAttValue = "{{$product->tag}}";
                    
                    break;
                
                    default:
                        break;
                }
                let category = document.querySelector(`.${attrubuteclass}`)
                const baseUrl = "{{ url('/') }}";
                const apiUrl = `${baseUrl}/api/fetch/${attrubuteclass}`;
                fetch(apiUrl)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        category.innerHTML = '';
                        const option = document.createElement('option');
                        option.value = '';
                        option.textContent = 'Select';
                        category.appendChild(option);
                        data.forEach(val => {
                            const option = document.createElement('option');
                            option.value = val.attribute_name;
                            option.textContent = val.attribute_name;
                            if(option.value == selectedAttValue){
                               option.setAttribute('selected', 'selected');
                            }
                            category.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('There has been a problem with your fetch operation:', error);
                    });
            }
            attrubuteSet('category');
            attrubuteSet('material-type');
            attrubuteSet('occasion');
            attrubuteSet('gemstone');
            attrubuteSet('style');
            attrubuteSet('color');
            attrubuteSet('tags');

            // check discount applicable if applicable so check is discount duration
            let discount_applicable = false;
            let isactive_discount_duration = false;
            if ("{{ old('discount_applicable') }}" || "{{ $product->discount }}") {
                document.querySelector('#discount_percentage').removeAttribute("disabled");
                document.querySelector('#isactive_discount_duration').removeAttribute("disabled");
                discount_applicable = true;
            }
            if ("{{ old('isactive_discount_duration') }}" || "{{ $product->discount_start }}") {
                document.querySelector('.time_range').removeAttribute("disabled", "disabled");
                isactive_discount_duration = true;
            }
            document.querySelector('#discount_applicable').addEventListener('click', () => {
                if (!discount_applicable) {
                    document.querySelector('#discount_percentage').removeAttribute("disabled");
                    document.querySelector('#isactive_discount_duration').removeAttribute("disabled");
                    discount_applicable = true;
                } else {
                    document.querySelector('#discount_percentage').setAttribute("disabled", "disabled");
                    document.querySelector('#isactive_discount_duration').setAttribute("disabled",
                        "disabled");
                    discount_applicable = false;
                }
            })
            document.querySelector('#isactive_discount_duration').addEventListener('click', () => {
                if (!isactive_discount_duration) {
                    document.querySelector('.time_range').removeAttribute("disabled");
                    isactive_discount_duration = true;
                } else {
                    document.querySelector('.time_range').setAttribute("disabled", "disabled");
                    isactive_discount_duration = false;
                }
            })

        });
    </script>
@endpush
@section('main-content')
    {{-- @if (isset($product->id))
    @dd($product->description)  
@endif --}}
    <span class="text-danger mb-5">
        @error('product_id')
            {{ $message }}
        @enderror
    </span>
    <div class="content">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Store</a></li>
                <li class="breadcrumb-item active">{{$formType == "update" ? "Update" : "Add" ;}} Product</li>
            </ol>
        </nav>

        <form enctype="multipart/form-data" method="POST" class="dropzone form" id="customDropzone"
            data-dropzone="data-dropzone">
            @csrf
            {{-- product publish confirmaiton modal --}}
            <div class="modal fade" id="verticallyCenteredOne" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="verticallyCenteredModalLabel">Confirm Publish</h5><button
                                class="btn btn-close p-1" type="button" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-body-tertiary lh-lg mb-0">Please confirm this product are published.</p>
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="submit">Publish</button><button
                                class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                    </div>
                </div>
            </div>
            {{-- product draft confirmaiton modal --}}
            <div class="modal fade" id="verticallyCenteredTwo" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="verticallyCenteredModalLabel">Confirm Draft</h5><button
                                class="btn btn-close p-1" type="button" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-body-tertiary lh-lg mb-0">Please confirm this product save in draft products due
                                to one week.</p>
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="submit">Confirm</button><button
                                class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                    </div>
                </div>
            </div>
            {{-- product discard confirmaiton modal --}}
            <div class="modal fade" id="verticallyCenteredThree" tabindex="-1"
                aria-labelledby="verticallyCenteredModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="verticallyCenteredModalLabel">Confirm Discard</h5><button
                                class="btn btn-close p-1" type="button" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-body-tertiary lh-lg mb-0">Please confirm this product discarded.</p>
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="submit">Confirm</button><button
                                class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                    </div>
                </div>
            </div>
            <div class="row g-3 flex-between-end mb-5">
                <div class="col-auto">
                    <h2 class="mb-2">{{$formType == "update" ? "Update" : "Add a" ;}} product</h2>
                    <h5 class="text-body-tertiary fw-semibold">Orders placed across your store</h5>
                </div>
                <div class="col-auto"><button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button"
                        data-bs-toggle="modal" onclick="form_Destination('discard')"
                        data-bs-target="#verticallyCenteredThree">Discard</button><button
                        class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" onclick="form_Destination('draft')"
                        data-bs-toggle="modal" data-bs-target="#verticallyCenteredTwo" type="button">Save
                        draft</button><button id="submit-all" class="btn btn-primary mb-2 mb-sm-0"
                        onclick="form_Destination('publish')" type="button" data-bs-toggle="modal"
                        data-bs-target="#verticallyCenteredOne">Publish product</button></div>
            </div>
            <div class="row g-5">
                <div class="col-12 col-xl-8">
                    <h4 class="mb-3">Product Title</h4><input name="product_title"
                        value="{{ old('product_title', $product->title ?? 'Untitled Product') }}" id="product_title" class="form-control"
                        type="text" placeholder="Write product title here..." />
                    <span class="text-danger mb-5">
                        @error('product_title')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="mb-6 mt-5">
                        <h4 class="mb-3"> Product Description</h4>
                        <textarea class="tinymce" name="product_discription" id="product_description"
                            data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'>
                            {{ old('product_discription', $product->description ?? 'No description yet.') }}
                        </textarea>
                        <span class="text-danger  mb-3">
                            @error('product_discription')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <h4 class="mb-3">Display images</h4>
                    <div class="p-0 mb-5">
                        <div class="dz-message mb-3 text-body-tertiary text-opacity-85" data-dz-message>
                            Drag your photo here<span class="text-body-secondary px-1">or</span>
                            <button class="btn btn-link p-0" type="button">use from device</button>
                            <br>
                            <img class="mt-3 me-2" src="{{ asset('/assets/img/icons/image-icon.png') }}" alt="">
                        </div>
                        <div id="dzPreviewContainer" class="dz-preview dz-preview-multiple m-0 d-flex flex-column"></div>
                    </div>
                    <h4 class="mb-3">Inventory</h4>
                    <div class="row g-0 border-top border-bottom">
                        <div class="col-sm-4">
                            <div class="nav flex-sm-column border-bottom border-bottom-sm-0 border-end-sm fs-9 vertical-tab h-100 justify-content-between"
                                role="tablist" aria-orientation="vertical">
                                <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center active"
                                    id="pricingTab" data-bs-toggle="tab" data-bs-target="#pricingTabContent"
                                    role="tab" aria-controls="pricingTabContent" aria-selected="true">
                                    <span class="me-sm-2 fs-4 nav-icons" data-feather="tag"></span>
                                    <span class="d-none d-sm-inline">Pricing</span>
                                </a>
                                <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center"
                                    id="restockTab" data-bs-toggle="tab" data-bs-target="#restockTabContent"
                                    role="tab" aria-controls="restockTabContent" aria-selected="false">
                                    <span class="me-sm-2 fs-4 nav-icons" data-feather="package"></span>
                                    <span class="d-none d-sm-inline">Restock</span>
                                </a>
                                <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center"
                                    id="shippingTab" data-bs-toggle="tab" data-bs-target="#shippingTabContent"
                                    role="tab" aria-controls="shippingTabContent" aria-selected="false">
                                    <span class="me-sm-2 fs-4 nav-icons" data-feather="truck"></span>
                                    <span class="d-none d-sm-inline">Delivery</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="tab-content py-3 ps-sm-4 h-100">
                                <div class="tab-pane fade show active" id="pricingTabContent" role="tabpanel">
                                    <h4 class="mb-3 d-sm-none">Pricing</h4>
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-12">
                                            <h5 class="mb-2 text-body-highlight">Product price</h5><input
                                                name="product_price" class="form-control" type="text"
                                                value="{{ old('product_price', '0') }}" placeholder="Rs" />
                                            <span class="text-danger  mb-3">
                                                @error('product_price')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row g-3 mt-3">
                                        <div class="col-12 col-lg-6">
                                            <h5 class="mb-2 text-body-highlight">Discount Applicable</h5>
                                            <div class="form-check form-switch mt-3">
                                                <input class="form-check-input" id="discount_applicable"
                                                    name="discount_applicable" id="flexSwitchCheckChecked"
                                                    type="checkbox" value="1"
                                                    @if (old('discount_applicable') || $product->discount){{'checked'}}@endif/>
                                                <span class="text-danger  mb-3">
                                                    @error('discount_applicable')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <h5 class="mb-2 text-body-highlight">Discount percentage</h5><input
                                                name="discount_percentage" id="discount_percentage" class="form-control"
                                                type="number" placeholder="%" value="{{ old('discount_percentage', $product->discount ?? 0) }}"
                                                disabled />
                                            <span class="text-danger  mb-3">
                                                @error('discount_percentage')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row g-3 mt-3">
                                        <div class="col-12 col-lg-6">
                                            <h5 class="mb-2 text-body-highlight">Is active discount duration</h5>
                                            <div class="form-check form-switch mt-3">
                                                <input class="form-check-input" id="isactive_discount_duration"
                                                    name="isactive_discount_duration" id="flexSwitchCheckChecked"
                                                    type="checkbox" value="1"
                                                    disabled
                                                    @if (old('isactive_discount_duration') || $product->discount_start){{'checked'}}@endif />
                                                <span class="text-danger  mb-3">
                                                    @error('isactive_discount_duration')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <h5 class="mb-2 text-body-highlight">Discount Time Range</h5>
                                            <input class="form-control time_range datetimepicker flatpickr-input"
                                                value="{{ old('time_range', $discountDuration ?? '') }}" id="timepicker2" name="time_range"
                                                type="text" placeholder="d/m/y to d/m/y"
                                                data-options="{&quot;mode&quot;:&quot;range&quot;,&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}"
                                                disabled readonly="readonly">
                                            <span class="text-danger  mb-3">
                                                @error('time_range')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade h-100" id="restockTabContent" role="tabpanel"
                                    aria-labelledby="restockTab">
                                    <div class="d-flex flex-column h-100">
                                        <h5 class="mb-2 mt-4 text-body-highlight">{{$formType == "update" ? "Update" : "Add" ;}} Stock</h5>
                                        <div class="row g-3 flex-1 mb-4">
                                            <div class="col-sm-7"><input class="form-control" name="quantity"
                                                    value="{{ old('quantity', $product->stock_quantity ?? 0) }}" type="number"
                                                    placeholder="Quantity" />
                                                <span class="text-danger  mb-3">
                                                    @error('quantity')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade h-100" id="shippingTabContent" role="tabpanel"
                                    aria-labelledby="shippingTab">
                                    <div class="d-flex flex-column h-100">
                                        <h5 class="mb-2 mt-4 text-body-highlight">Delivery Charges</h5>
                                        <div class="row g-3 flex-1 mb-4">
                                            <div class="col-sm-7"><input class="form-control"
                                                    value="{{ old('Delivery_charges', $product->delivery_charges ?? 0) }}" name="Delivery_charges"
                                                    type="number" placeholder="Rs:" />
                                                <span class="text-danger  mb-3">
                                                    @error('Delivery_charges')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input value="{{ $id }} " name="product_id" type="hidden" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="row g-2">
                        <div class="col-12 col-xl-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Organize</h4>
                                    <div class="row gx-3">
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="mb-4">
                                                <div class="d-flex flex-wrap mb-2">
                                                    <h5 class="mb-0 text-body-highlight me-2">Category</h5><a
                                                        class="fw-bold fs-9"
                                                        href="{{ route('add-new-category-page') }}">Add new category</a>
                                                </div><select name="category" class="form-select category"
                                                    aria-label="category">
                                                    <option selected value="">Select</option>
                                                </select>
                                                <span class="text-danger  mb-3">
                                                    @error('category')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="mb-4">
                                                <div class="d-flex flex-wrap mb-2">
                                                    <h5 class="mb-0 text-body-highlight me-2">Material Type</h5><a
                                                        class="fw-bold fs-9"
                                                        href="{{ route('add-new-category-page') }}">Add new material</a>
                                                </div><select name="material_type" class="form-select material-type"
                                                    aria-label="category">
                                                    <option selected value="">Select</option>
                                                </select>
                                                <span class="text-danger  mb-3">
                                                    @error('material_type')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="mb-4">
                                                <div class="d-flex flex-wrap mb-2">
                                                    <h5 class="mb-0 text-body-highlight me-2">Occasion</h5><a
                                                        class="fw-bold fs-9"
                                                        href="{{ route('add-new-category-page') }}">Add new occasion</a>
                                                </div><select name="occasion" class="form-select occasion"
                                                    aria-label="category">
                                                    <option selected value="">Select</option>
                                                </select>
                                                <span class="text-danger  mb-3">
                                                    @error('occasion')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="mb-4">
                                                <div class="d-flex flex-wrap mb-2">
                                                    <h5 class="mb-0 text-body-highlight me-2">Gemstone</h5><a
                                                        class="fw-bold fs-9"
                                                        href="{{ route('add-new-category-page') }}">Add new gemstone</a>
                                                </div><select name="gemstone" class="form-select gemstone"
                                                    aria-label="category">
                                                    <option selected value="">Select</option>
                                                </select>
                                                <span class="text-danger  mb-3">
                                                    @error('gemstone')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="mb-4">
                                                <div class="d-flex flex-wrap mb-2">
                                                    <h5 class="mb-0 text-body-highlight me-2">Style</h5><a
                                                        class="fw-bold fs-9"
                                                        href="{{ route('add-new-category-page') }}">Add new style</a>
                                                </div><select name="style" class="form-select style"
                                                    aria-label="category">
                                                    <option selected value="">Select</option>
                                                </select>
                                                <span class="text-danger  mb-3">
                                                    @error('style')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="mb-4">
                                                <div class="d-flex flex-wrap mb-2">
                                                    <h5 class="mb-0 text-body-highlight me-2">Color</h5><a
                                                        class="fw-bold fs-9"
                                                        href="{{ route('add-new-category-page') }}">Add new color</a>
                                                </div><select name="color" class="form-select color"
                                                    aria-label="category">
                                                    <option selected value="">Select</option>
                                                </select>
                                                <span class="text-danger  mb-3">
                                                    @error('color')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="d-flex flex-wrap mb-2">
                                                <h5 class="mb-0 text-body-highlight me-2">Tags</h5><a
                                                    class="fw-bold fs-9 lh-sm"
                                                    href="{{ route('add-new-category') }}">View all tags</a>
                                            </div><select name="tag" class="form-select tags" aria-label="category">
                                                <option selected value="">Select</option>
                                            </select>
                                            <span class="text-danger  mb-3">
                                                @error('tag')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection
