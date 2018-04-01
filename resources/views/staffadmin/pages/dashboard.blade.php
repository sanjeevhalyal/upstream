@extends('staffadmin.layouts.app')

@section('admincontent')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Users</h4>
              <p><b>21</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Staff</h4>
              <p><b>5</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Categories</h4>
              <p><b>5</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Products</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2 vcenter" align="middle">
          <div class="tile" >
            <div class="tile-title-w-btn">
              <h4 class="title">Select Date</h4>
            </div>
            <div class="tile-body">
              <p>Select Date to see the Inventory:</p>
              <input class="form-control" id="demoDate" type="text" placeholder="Select Date">
            </div>
            <br>
              <button class="btn btn-primary " >Next</button>

          </div>
        </div>
        <div class="col-md-4" align="middle">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Select Category</h3>
            </div>
            <div class="title-body">
              <p>Select Suitable category to see Inventory:</p>
            </div>
            <div class="bs-component">
              <div class="list-group"><a class="list-group-item list-group-item-action active" href="#" >Instruments</a>
                <a class="list-group-item list-group-item-action" href="#">Music</a>
                <a class="list-group-item list-group-item-action" href="#">Utensils</a>
                <a class="list-group-item list-group-item-action" href="#">Electronics</a>
                <a class="list-group-item list-group-item-action" href="#">Costumes</a>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Products Stock</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Outgoing Products</h3>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Society Name</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td><a class="btn btn-info">Dispatch</a>
                      <!--<button class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i></button>-->
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td><a class="btn btn-info"></i>Dispatch</a></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td><a class="btn btn-info"></i>Dispatch</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>

          <div class="col-md-6">
            <div class="tile">
              <h3 class="tile-title">Incoming Products</h3>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Product Name</th>
                      <th>Society Name</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td><a class="btn btn-primary"></i>Accept</a></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td><a class="btn btn-primary"></i>Accept</a></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td><a class="btn btn-primary"></i>Accept</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
      </div>
@endsection
