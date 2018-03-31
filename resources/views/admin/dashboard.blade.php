  @extends('layouts.app')

  @section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">ADMIN Dashboard</div>

                  <div class="panel-body">
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                        </div>
                    @endif
                    <button type="submit" name="button" class="btn btn-primary" id="userbutton">User Status</button>
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
  </script>
@endsection
