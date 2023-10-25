<html lang="fr">
<head>
@include('layouts.head')
</head>
<body class="g-sidenav-show  bg-gray-200">


  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <br>
  @include('layouts.form')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-white shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-dark text-capitalize ps-3 text-center">SUIVI DE PAIEMNT</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-dark text-sm font-weight-bold mb-0">MOIS</th>
                      <th class="text-dark text-sm font-weight-bold mb-0">MONTANT</th>
                      <th class="text-dark text-sm font-weight-bold mb-0">ÉTAT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ App\Repositories\InvoiceRepository::getInvoiceByUser(Auth::user()->email)->getMonth(App\Repositories\InvoiceRepository::getInvoiceByUser(Auth::user()->email)->months_id) }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-dark text-xs font-weight-bold mb-0">{{ App\Repositories\InvoiceRepository::getInvoiceByUser(Auth::user()->email)->amount }}</p>
                      </td>
                      <td>
                        <p class="text-dark text-xs font-weight-bold mb-0">{{ App\Repositories\InvoiceRepository::getInvoiceByUser(Auth::user()->email)->getState(App\Repositories\InvoiceRepository::getInvoiceByUser(Auth::user()->email)->states_id) }}</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  @include('layouts.js')
</body>
</html>