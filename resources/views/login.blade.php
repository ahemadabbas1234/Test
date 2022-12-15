
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<!-- Button trigger modal -->
<br><br>
      <div class="container">
        <form method="post" action="{{url('login')}}">
          {{csrf_field()}}

          <div class="form-group">
            <label for="exampleInputEmail1">Email Address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Address" name="email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" name="password">
          </div>

          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>

<br><br>