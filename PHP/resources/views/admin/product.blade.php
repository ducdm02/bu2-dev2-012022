@extends('admin_page')
@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="text-center">
       
      </div>
    <div class="p-2 flex-shrink-0 bd-highlight">
        <a href="" class="btn btn-success btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">
            Thêm sản phẩm
        </a>
    </div>
    <table class="table table-striped table-dark">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table><div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <i class="fas fa-user prefix grey-text"></i>
              <input type="text" id="orangeForm-name" class="form-control validate">
              <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
            </div>
            <div class="md-form mb-5">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="email" id="orangeForm-email" class="form-control validate">
              <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
            </div>
    
            <div class="md-form mb-4">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" id="orangeForm-pass" class="form-control validate">
              <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
            </div>
    
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-deep-orange">Sign up</button>
          </div>
        </div>
      </div>
    </div>
    
    
</div>
@endsection