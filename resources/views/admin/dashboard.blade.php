  @extends('layouts.app')


  @section('content')
<style>

    .btn-search {
        background-color: #666;
        color: #fff;
        border-radius:0;
        border-color:#666;
    }

    .input-search {
        border-radius:0;
        background-color: #eee;
        box-shadow: none;
        border: none;
        border-right: 1px solid #eee;
    }

    .input-search:focus {
        box-shadow: none;
    }
    td
    {
        valign:"middle";
    }


    </style>




  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default" >
                  <div class="panel-heading" >ADMIN Dashboard</div>
                  <br>
                  <div class="row">
                              <div class="col-lg-6 col-lg-offset-1">

                                  <div class="input-group" >
                                      <input class="form-control input-search" type="text" id="searchbox">
                                      <span class="input-group-btn">
          <button class="btn btn-search" type="button" onClick="searchuser()">Search</button>
        </span>
                                  </div><!-- /input-group -->
                              </div><!-- /.col-lg-6 -->
                          </div><!-- /.row -->
                  <br>
                      <table class="table table-hover">
                          <thead>
                          <tr>
                              <th scope="col">User Name</th>
                              <th scope="col">Email ID</th>
                              <th scope="col"></th>
                          </tr>
                          </thead>
                          <tbody id="userlist">


                          </tbody>
                      </table>

                  <div class="panel-body">
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                        </div>
                    @endif

                    {{-- form for storing the Values --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
  <script >
  $(document).ready(function(){
    $("#userbutton").click(function(e){
      e.preventDefault();
      console.log("ajax");
    //   $.ajax({
    //     type: "GET",
    //     url : "http://127.0.0.1:8000/admin/user",
    //     dataType : "json",
    //     success : function(data){
    //         if(data.length > 0) {
    //           console.log(data);
    //         } else {
    //           console.log('Nothing in the DB');
    //         }
    //     }
    // }, "json");





      console.log("start");
        $.get("/admin/user",function(data){
            console.log(data);
        });
    });
  });


  function searchuser() {
      var query = document.getElementById('searchbox').value;

      //for Categories
      $.ajax({
          type: "POST",

          url: '/getuserlist',
          data: {'search': query,_token: '{{csrf_token()}}'},
          success: function (msg) {
              if (msg) {
                  var ajaxDisplay = document.getElementById('userlist');
                  ajaxDisplay.innerHTML = msg;
              }
              else {
                  alert("Request not proceed");
              }
          }
      });
  }

  function makeadmin(i)
  {
      $.ajax({
          type: "POST",

          url: '/makeasadmin',
          data: {'id': i,_token: '{{csrf_token()}}'},
          success: function (msg) {
              if (msg) {
                  console.log(msg);
                  searchuser();
              }
              else {
                  alert("Request not proceed");
              }
          }
      });
  }

  function removeadmin(i)
  {
      $.ajax({
          type: "POST",

          url: '/removeadmin',
          data: {'id': i,_token: '{{csrf_token()}}'},
          success: function (msg) {
              if (msg) {
                  searchuser();
              }
              else {
                  alert("Request not proceed");
              }
          }
      });
  }
  </script>
@endsection
