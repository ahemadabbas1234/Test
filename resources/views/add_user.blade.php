@include('header')

<div>

  @if(Session::has('message'))
  <p class="alert alert-info">{{ Session::get('message') }}</p>
  @endif

</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Add User
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" name="username">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">User Mobile</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile No" name="mobileno">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>

          <button type="submit" class="btn btn-primary insert">Add User</button>
        </form>
      </div>
    </div>
  </div>
</div>

<br><br>

<div class="container">
   <table class="table table-bordered">
       <thead>
           <th>Sr No</th>
           <th>User Name</th>
           <th>User Mobile</th>
           <th>User Email</th>
           <th>User Password</th>
           <th>Delete</th>
           <th>Edit</th>
       </thead>
       @foreach($data as $key => $view)
       <tr>
        <td>{{$key+1}}</td>
        <td>{{$view->username}}</td>
        <td>{{$view->mobile_no}}</td>
        <td>{{$view->email_id}}</td>
        <td>{{$view->password}}</td>
        <td><a href="{{url('/update_user').'/'.$view->id}}">Update</a></td>
        <td><a href="{{url('/delete').'/'.$view->id}}">Delete</a></td>
       </tr>
       @endforeach
   </table>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  
$(".insert").click(function(event) {

  // alert($('form').serialize());
    event.preventDefault();
    $.ajax({
        type: "post",
        url: "{{ url('add_user_post') }}",
        dataType: "html",
        data: $('form').serialize(),
        success: function(data){

              var response = JSON.parse(data);
              if(response['response'] == true)
              {

                // $.session.set('message', 'Add Successfull...');
                location.reload();
              }
              // alert("Data Save: " + data);
        },
        // error: function(data){
        // $('#exampleModalLong').modal('hide');

        // }
    });

});

</script>
