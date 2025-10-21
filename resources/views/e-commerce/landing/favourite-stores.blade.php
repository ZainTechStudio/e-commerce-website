@extends('e-commerce.landing.layout.main')
@push('link-special')
    <title>Jewellery Artistic</title>
@endpush
@section('main-content')
<!-- ============================================-->
      <!-- <section> begin ============================-->
        <section class="pt-5 pb-9">
          <div class="container-small">
            <nav class="mb-3" aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
                <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
                <li class="breadcrumb-item active" aria-current="page">Default</li>
              </ol>
            </nav>
            <h2 class="mb-1">My Favourite Stores</h2>
            <p class="mb-5 text-body-tertiary fw-semibold">Essential for a better life</p>
            <div class="row gx-3 gy-5">
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/dell.png" alt="Dell Technologies" /></div>
                <h5 class="mb-2">Dell Technologies</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(1263 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/intel-2.png" alt="Intel" /></div>
                <h5 class="mb-2">Intel</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(1542 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/honda.png" alt="Honda" /></div>
                <h5 class="mb-2">Honda</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(596 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/asus-rog.png" alt="Asus ROG" /></div>
                <h5 class="mb-2">Asus ROG</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(2365 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/yamaha.png" alt="Yamaha" /></div>
                <h5 class="mb-2">Yamaha</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(1253 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/ibm.png" alt="IBM" /></div>
                <h5 class="mb-2">IBM</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(996 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/apple-2.png" alt="Apple Store" /></div>
                <h5 class="mb-2">Apple Store</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(365 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/oppo.png" alt="Oppo" /></div>
                <h5 class="mb-2">Oppo</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(576 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/redragon.png" alt="Redragon" /></div>
                <h5 class="mb-2">Redragon</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(1125 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/xbox.png" alt="Microsoft XBOX" /></div>
                <h5 class="mb-2">Microsoft XBOX</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(830 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/lenovo.png" alt="Lenovo" /></div>
                <h5 class="mb-2">Lenovo</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(1032 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/xiaomi.png" alt="Xiaomi" /></div>
                <h5 class="mb-2">Xiaomi</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(965 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/oneplus-2.png" alt="Oneplus" /></div>
                <h5 class="mb-2">Oneplus</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(562 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/suzuki-2.png" alt="Suzuki" /></div>
                <h5 class="mb-2">Suzuki</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(125 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/google-store.png" alt="Google store" /></div>
                <h5 class="mb-2">Google store</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(1859 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
                <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;"><img class="mw-100" src="../../../assets/img/brands/hp.png" alt="HP Global Store" /></div>
                <h5 class="mb-2">HP Global Store</h5>
                <div class="mb-1 fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span><span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span></div>
                <p class="text-body-quaternary fs-9 mb-2 fw-semibold">(365 people rated)</p><a class="btn btn-link p-0" href="#!">Visit Store<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
                <div class="hover-actions top-0 end-0 mt-2 me-3">
                  <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- end of .container-->
        </section><!-- <section> close ============================-->
        <!-- ============================================-->

@endsection