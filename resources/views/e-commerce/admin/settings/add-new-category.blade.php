@extends('e-commerce.admin.layout.main')
@if ($errors->any())
@php
    $msg2 = 'Alert: all fields is required and text format.';
@endphp
@endif

@push('title')
    <title>Jewellery Artistic</title>
@endpush
@push('style')
    <link href="../../../vendors/choices/choices.min.css" rel="stylesheet">
@endpush
@push('script')
  <script src="../../../vendors/choices/choices.min.js"></script>
  <script>
    // select nav item 
    navitemsactiveness('add-new-category')
    navitemvisibility('nv-settings')

    let option_num = 1
    document.addEventListener("DOMContentLoaded", function () {
    document.querySelector('#another_opt').addEventListener('click', () => {
      option_num++
      document.querySelector('#attribute_container').insertAdjacentHTML('beforeend', `
      <div class="col-12 col-sm-6 col-xl-12 new-choice">
              <div class="border-bottom border-translucent border-dashed border-sm-0 border-bottom-xl pb-4">
                <div class="d-flex flex-wrap mb-2">
                  <h5 class="text-body-highlight me-2">Option ${option_num}</h5>
                </div>
                <select name="attribute_type[]" class="form-select mb-3" required>
                  <option value="1">Category</option>
                    <option value="2">Material Type</option>
                    <option value="3">Occasion</option>
                    <option value="4">Gemstone</option>
                    <option value="5">Color</option>
                    <option value="6">Style</option>
                    <option value="7">Tag</option>
                  </select>
                  <div class="product-variant-select-menu">
                  <input class="form-control form-control" name="attribute_name[]" id="sizingInput" type="text" placeholder="Attrubute name" required />
                </div>
              </div>
            </div>
            `);

        // Find ONLY the newly added select element
        let newSelects = document.querySelectorAll('.new-choice .product-variant-select-menu select');
        newSelects.forEach(select => {
          new Choices(select, {
            removeItemButton: true,
            placeholder: true
          });
        });

        // Remove the temporary class to avoid duplicate initialization
        document.querySelectorAll('.new-choice').forEach(el => el.classList.remove('new-choice'));
    });
});

</script>
@endpush
@section('main-content')
<div class="content">
  <nav class="mb-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="#">Settings</a></li>
      <li class="breadcrumb-item"><a href="{{route('add-product')}}">Add Products</a></li>
      <li class="breadcrumb-item active">Add Attribute</li>
    </ol>
  </nav>
  @if (isset($msg1))
  <div class="alert alert-outline-success d-flex align-items-center mt-3" role="alert">
    <span class="fas fa-check-circle text-success fs-5 me-3"></span>
    <p class="mb-0 flex-1">{{$msg1}}</p>
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @elseif (isset($msg2))
  <div class="alert alert-outline-danger d-flex align-items-center mt-3" role="alert">
    <span class="fas fa-times-circle text-danger fs-5 me-3"></span>
    <p class="mb-0 flex-1">{{$msg2}}</p>
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="container d-flex justify-content-center align-items-center mt-12">
    <div class="col-12 col-xl-6">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('add-new-category') }}" method="post">
            @csrf
            <h4 class="card-title mb-4">Add Attribute</h4>
            <div id="attribute_container" class="row g-3 mb-3">
              <div class="col-12 col-sm-12 col-xl-12">
                <div class="border-bottom border-translucent border-dashed border-sm-0 border-bottom-xl pb-4">
                  <div class="d-flex flex-wrap mb-2">
                    <h5 class="text-body-highlight me-2">Option 1</h5>
                  </div><select name="attribute_type[]" class="form-select mb-3" required>
                    <option value="1">Category</option>
                    <option value="2">Material Type</option>
                    <option value="3">Occasion</option>
                    <option value="4">Gemstone</option>
                    <option value="5">Color</option>
                    <option value="6">Style</option>
                    <option value="7">Tag</option>
                  </select>
                  <div class="product-variant-select-menu">
                    <input class="form-control form-control" name="attribute_name[]" id="sizingInput" type="text" placeholder="Attrubute name" required />
                  </div>
                </div>
              </div>
            </div>
            <button id="another_opt" class="btn btn-phoenix-primary w-100" type="button">Add another option</button>
            <button class="mt-2 btn btn-primary w-100" type="submit">Add Attributet</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection