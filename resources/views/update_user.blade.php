@include('header')
<!-- Button trigger modal -->
<br><br>
      <div class="container">
        <form method="post" action="{{url('update_user_post')}}">
          {{csrf_field()}}

          <input type="hidden" name="hidden_id" value="{{$single_data[0]->id}}">
          <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" name="username_update" value="{{$single_data[0]->username}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">User Mobile</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile No" name="mobileno_update" value="{{$single_data[0]->mobile_no}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email_update" value="{{$single_data[0]->email_id}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_update" value="{{$single_data[0]->password}}">
          </div>

          <button type="submit" class="btn btn-primary">Add User</button>
        </form>
      </div>

<br><br>