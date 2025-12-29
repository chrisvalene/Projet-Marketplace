@extends('layouts.compte')
@section('h3', 'Tableau de bord Acheteur')
@section('contenu')

 {{-- ******************************zone d'enregistrement************************    --}}
 <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
         {{-- ********************bilan d'information******************** --}}
       <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                      <span class="h2 font-weight-bold mb-0">350,897</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                      <span class="h2 font-weight-bold mb-0">2,356</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
         {{-- ***********************fin bilan**************************** --}}
        </div>
      </div>
    </div>
{{-- ******************************fin zone************************************ --}}
        <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Liste des produits</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Vue</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">COD</th>
                    <th scope="col">NOM</th>
                    <th scope="col">QUANTITE</th>
                    <th scope="col">PRIX</th>
                  </tr>
                </thead>
                <tbody>
                 
                  
                 
                  <tr>
                    <th scope="row">
                      /argon/profile.html
                    </th>
                    <td>
                      1,795
                    </td>
                    <td>
                      190
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      
    </div>

      
   <!-- modal enregistrement de client -->
       <div class="modal fade" id="ajou" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title">Enregistrer un nouveau produit</h5>
							<button type="button" class="btn-close" data-dismiss="modal" aria-label="close"></button>
							</div>
							<div class="modal-body">
							   <form action="" class="row g-4" method="post" enctype="multipart/form-data">
                                   <div class="col-md-12 mb-4">
                                    <input type="text" class="form-control" placeholder="Nom produit" name="nom">
                                </div>
                                   <div class="col-md-12 mb-4">

                                     <div class="col-md-12 mb-4">
                                    <input type="file" class="form-control" name="photo">
                                </div>

                                 <input type="number" class="form-control" placeholder="Prix unitaire" name="prix">
                                </div>
                                    

                                   <div class="col-md-12 mb-4">
                                    <textarea name="description" id="" class="form-control" placeholder="Description du produit"></textarea>
                                   
                                </div>

                                 
                                <div class="text-center">
                                    <button class="btn btn-primary" name="send_prod">Enregistrer</button>
                                </div>
                               </form>
							</div>
							</div>
							
						</div>
						</div>
					</div><!-- End Vertically centered Modal-->


@endsection