<div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-body">
                <form role="form" class="text-start" method="POST" action="{{ route('validation') }}">
                @csrf
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-white border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Veuillez renseigner un montant</h4>
                </div>
              </div>
              <br>
                 <div class="input-group input-group-outline my-3">
                    <label class="form-label">Montant</label>
                    <input type="number" class="form-control" name="amount">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">VALIDER</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
 