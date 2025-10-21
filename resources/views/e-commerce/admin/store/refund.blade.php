@extends('e-commerce.admin.layout.main')
@push('title')
    <title>Jewellery Artistic</title>
@endpush
@push('script')
  <script>
    navitemsactiveness('refund')
    navitemvisibility('nv-store')
  </script>
@endpush
@section('main-content')
<div class="content">
  <nav class="mb-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="#!">Store</a></li>
      <li class="breadcrumb-item active">Refund</li>
    </ol>
  </nav>
  <div class="mb-9">
    <h2 class="mb-2">Refund</h2>
    <div class="row align-items-center mb-3 gx-3 gy-2">
      <div class="col-12 col-sm-auto">
        <p class="text-body-secondary lh-sm mb-0">Order : <a class="fw-bold ms-1" href="#!">#349</a></p>
      </div>
      <div class="col-12 col-sm-auto flex-grow-1">
        <div class="row align-items-center flex-wrap gy-1">
          <div class="col-auto flex-grow-1">
            <p class="text-body-secondary lh-sm mb-0">Customer ID : <a class="fw-bold ms-1" href="#!">2364847</a></p>
          </div>
          <div class="col-auto">
            <div class="dropdown"><button class="btn dropdown-toggle dropdown-caret-none px-0 text-body" type="button" data-bs-toggle="dropdown" aria-expanded="false">More action<span class="fas fa-chevron-down ms-2 fs-10"></span></button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><a class="dropdown-item" href="#">Cancel</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row gx-5">
      <div class="col-12 col-xl-8 col-xxl-9">
        <div id="orderTable" data-list='{"valueNames":["products","color","size","price","quantity","total"],"page":10}'>
          <div class="table-responsive scrollbar">
            <table class="table fs-9 mb-0 border-top border-translucent">
              <thead>
                <tr>
                  <th class="sort white-space-nowrap align-middle fs-10" scope="col"></th>
                  <th class="sort white-space-nowrap align-middle" scope="col" style="min-width:400px;" data-sort="products">PRODUCTS</th>
                  <th class="sort align-middle ps-4" scope="col" data-sort="color" style="width:150px;">COLOR</th>
                  <th class="sort align-middle ps-4" scope="col" data-sort="size" style="width:300px;">SIZE</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">PRICE</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="quantity" style="width:200px;">QUANTITY</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="total" style="width:250px;">TOTAL</th>
                </tr>
              </thead>
              <tbody class="list" id="order-table-body">
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                  <td class="align-middle white-space-nowrap py-2"><a class="d-block border border-translucent rounded-2" href="../../../apps/e-commerce/landing/product-details.html"><img src="../../../assets/img//products/1.png" alt="" width="53" /></a></td>
                  <td class="products align-middle py-0"><a class="fw-semibold line-clamp-2 mb-0" href="../../../apps/e-commerce/landing/product-details.html">Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management &amp; Skin Temperature Trends, Carbon/Graphite, One Size (S &amp; L Bands)</a></td>
                  <td class="color align-middle white-space-nowrap text-body py-0 ps-4">Pure matte black</td>
                  <td class="size align-middle white-space-nowrap text-body-tertiary fw-semibold py-0 ps-4">42</td>
                  <td class="price align-middle text-body fw-semibold text-end py-0 ps-4">$57</td>
                  <td class="quantity align-middle text-end py-0 ps-4 text-body-tertiary">4</td>
                  <td class="total align-middle fw-bold text-body-highlight text-end py-0 ps-4">$228</td>
                </tr>
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                  <td class="align-middle white-space-nowrap py-2"><a class="d-block border border-translucent rounded-2" href="../../../apps/e-commerce/landing/product-details.html"><img src="../../../assets/img//products/2.png" alt="" width="53" /></a></td>
                  <td class="products align-middle py-0"><a class="fw-semibold line-clamp-2 mb-0" href="../../../apps/e-commerce/landing/product-details.html">iPhone 13 pro max-Pacific Blue-128GB storage</a></td>
                  <td class="color align-middle white-space-nowrap text-body py-0 ps-4">Glossy black</td>
                  <td class="size align-middle white-space-nowrap text-body-tertiary fw-semibold py-0 ps-4">XL</td>
                  <td class="price align-middle text-body fw-semibold text-end py-0 ps-4">$199</td>
                  <td class="quantity align-middle text-end py-0 ps-4 text-body-tertiary">2</td>
                  <td class="total align-middle fw-bold text-body-highlight text-end py-0 ps-4">$398</td>
                </tr>
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                  <td class="align-middle white-space-nowrap py-2"><a class="d-block border border-translucent rounded-2" href="../../../apps/e-commerce/landing/product-details.html"><img src="../../../assets/img//products/3.png" alt="" width="53" /></a></td>
                  <td class="products align-middle py-0"><a class="fw-semibold line-clamp-2 mb-0" href="../../../apps/e-commerce/landing/product-details.html">Apple MacBook Pro 13 inch-M1-8/256GB-space</a></td>
                  <td class="color align-middle white-space-nowrap text-body py-0 ps-4">Glossy black</td>
                  <td class="size align-middle white-space-nowrap text-body-tertiary fw-semibold py-0 ps-4">L</td>
                  <td class="price align-middle text-body fw-semibold text-end py-0 ps-4">$600</td>
                  <td class="quantity align-middle text-end py-0 ps-4 text-body-tertiary">1</td>
                  <td class="total align-middle fw-bold text-body-highlight text-end py-0 ps-4">$600</td>
                </tr>
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                  <td class="align-middle white-space-nowrap py-2"><a class="d-block border border-translucent rounded-2" href="../../../apps/e-commerce/landing/product-details.html"><img src="../../../assets/img//products/4.png" alt="" width="53" /></a></td>
                  <td class="products align-middle py-0"><a class="fw-semibold line-clamp-2 mb-0" href="../../../apps/e-commerce/landing/product-details.html">Apple iMac 24&quot; 4K Retina Display M1 8 Core CPU, 7 Core GPU, 256GB SSD, Green (MJV83ZP/A) 2021</a></td>
                  <td class="color align-middle white-space-nowrap text-body py-0 ps-4">Gray</td>
                  <td class="size align-middle white-space-nowrap text-body-tertiary fw-semibold py-0 ps-4">22</td>
                  <td class="price align-middle text-body fw-semibold text-end py-0 ps-4">$250</td>
                  <td class="quantity align-middle text-end py-0 ps-4 text-body-tertiary">2</td>
                  <td class="total align-middle fw-bold text-body-highlight text-end py-0 ps-4">$500</td>
                </tr>
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                  <td class="align-middle white-space-nowrap py-2"><a class="d-block border border-translucent rounded-2" href="../../../apps/e-commerce/landing/product-details.html"><img src="../../../assets/img//products/5.png" alt="" width="53" /></a></td>
                  <td class="products align-middle py-0"><a class="fw-semibold line-clamp-2 mb-0" href="../../../apps/e-commerce/landing/product-details.html">Razer Kraken v3 x Wired 7.1 Surroung Sound Gaming headset</a></td>
                  <td class="color align-middle white-space-nowrap text-body py-0 ps-4">Black</td>
                  <td class="size align-middle white-space-nowrap text-body-tertiary fw-semibold py-0 ps-4">L</td>
                  <td class="price align-middle text-body fw-semibold text-end py-0 ps-4">$49</td>
                  <td class="quantity align-middle text-end py-0 ps-4 text-body-tertiary">3</td>
                  <td class="total align-middle fw-bold text-body-highlight text-end py-0 ps-4">$147</td>
                </tr>
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                  <td class="align-middle white-space-nowrap py-2"><a class="d-block border border-translucent rounded-2" href="../../../apps/e-commerce/landing/product-details.html"><img src="../../../assets/img//products/6.png" alt="" width="53" /></a></td>
                  <td class="products align-middle py-0"><a class="fw-semibold line-clamp-2 mb-0" href="../../../apps/e-commerce/landing/product-details.html">PlayStation 5 DualSense Wireless Controller</a></td>
                  <td class="color align-middle white-space-nowrap text-body py-0 ps-4">Green Golden</td>
                  <td class="size align-middle white-space-nowrap text-body-tertiary fw-semibold py-0 ps-4">Regular</td>
                  <td class="price align-middle text-body fw-semibold text-end py-0 ps-4">$65</td>
                  <td class="quantity align-middle text-end py-0 ps-4 text-body-tertiary">2</td>
                  <td class="total align-middle fw-bold text-body-highlight text-end py-0 ps-4">$130</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="d-flex flex-between-center py-3 border-bottom border-translucent mb-6">
          <p class="text-body-emphasis fw-semibold lh-sm mb-0">Items subtotal :</p>
          <p class="text-body-emphasis fw-bold lh-sm mb-0">$1690</p>
        </div>
      </div>
      <div class="col-12 col-xl-4 col-xxl-3">
        <div class="row">
          <div class="col-12">
            <div class="card mb-3">
              <div class="card-body">
                <h3 class="card-title mb-4">Summary</h3>
                <div>
                  <div class="d-flex justify-content-between">
                    <p class="text-body fw-semibold">Items subtotal :</p>
                    <p class="text-body-emphasis fw-semibold">$691</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-body fw-semibold">Discount :</p>
                    <p class="text-danger fw-semibold">-$59</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-body fw-semibold">Tax :</p>
                    <p class="text-body-emphasis fw-semibold">$126.20</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-body fw-semibold">Subtotal :</p>
                    <p class="text-body-emphasis fw-semibold">$665</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-body fw-semibold">Shipping Cost :</p>
                    <p class="text-body-emphasis fw-semibold">$30</p>
                  </div>
                </div>
                <div class="d-flex justify-content-between border-top border-translucent border-dashed pt-4">
                  <h4 class="mb-0">Total :</h4>
                  <h4 class="mb-0">$695.20</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title mb-4">Refund Amount</h4><input class="form-control mb-4" id="refundInput" type="text" placeholder="Amount" /><button class="btn btn-primary w-100">Refund $500</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection