@extends('frontend.app')

@section('content')
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS (tambahkan ini) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <div class="col-xl-10 col-lg-12 m-auto">
        <div class="product-detail accordion-detail">
            <div class="row mb-50 mt-30">
                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                    
                </div>
            </div>
            <section class="h-100">
                <div class="container h-100 py-5">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-10">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0">Keranjang</h3>
                        <div>
                          <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                                class="fas fa-angle-down mt-1"></i></a></p>
                        </div>
                      </div>
              
                      @foreach($cartItems as $item)
                      <div class="card rounded-3 mb-4">
                        <div class="card-body p-4 border-success">
                          <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                              <img src="{{ $item->product->photo }}" class="img-fluid rounded-3" alt="{{ $item->product->name }}">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                              <p class="lead fw-normal mb-2">{{ $item->product->nama }}</p>
                              <p><span class="text-muted">Size: </span>{{ $item->product->size }} <span class="text-muted">Color: </span>{{ $item->product->color }}</p>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                <i class="fas fa-minus"></i>
                              </button>
                              <input id="form1" min="0" name="quantity" value="{{ $item->kuantitas }}" type="number"
                                class="form-control form-control-sm" />
                              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                <i class="fas fa-plus"></i>
                              </button>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                              <h5 class="mb-0">Rp.{{ $item->total_harga }}</h5>
                              <input class="form-check-input div-center" type="checkbox" id="checkboxNoLabel" value="" aria-label="..." />
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                  
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                              <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
              
                      <div class="card mb-4">
                        <div class="card-body p-4 d-flex flex-row">
                          <div data-mdb-input-init class="form-outline flex-fill">
                            <input type="text" id="form1" class="form-control form-control-lg" />
                            <label class="form-label" for="form1">Discount code</label>
                          </div>
                          <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-success btn-lg ms-3">Apply</button>
                        </div>
                      </div>
              
                      <div class="card">
                        <div class="card-body">
                          <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block btn-lg">Proceed to Pay</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            <div class="product-info">
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
