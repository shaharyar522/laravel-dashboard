<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- FontAwesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <!-- now i am ad link sweet alert message  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- jQuery (required for Bootstrap + AJAX) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JS (include after jQuery) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  {{-- uay css ki file add ina --}}
  <link rel="stylesheet" href="{{ asset('css/admin.css')}}">
  <link rel="stylesheet" href="{{asset('css/students_table.css')}}">
  <title>Dashboard - Users</title>
</head>

<body>

  {{-- uay harmaray pass side bar hain --}}
  <input type="checkbox" id="checkbox">
  <header class="header">
    <h2 class="u-name">My <b>Website</b>
      <label for="checkbox">
        <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
      </label>
    </h2>
    <div class="user-controls">
      <i class="fa fa-bell notification-bell" aria-hidden="true"></i>

      <div class="user-dropdown">
        <i class="fa fa-user" aria-hidden="true"></i>
        <span class="username">shari</span>
        <i class="fa fa-caret-down" aria-hidden="true"></i>
        <div class="dropdown-content">
          <a href="#"><i class="fa fa-user"></i> Profile</a>
          <a href="#"><i class="fa fa-cog"></i> Settings</a>
          <a href="#"><i class="fa fa-power-off"></i> Logout</a>
        </div>
      </div>
    </div>
  </header>

  <div class="body">

    <nav class="side-bar">
      <div class="user-p">

        <img src="images/Profile picture.png" alt="Admin">

        <p>Admin</p>
      </div>
      <ul>
        <li>
          <a href="">
            <i class="fa-solid fa-users"></i>
            <span>Users</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="fa  fa-wpforms"></i>
            <span>Post</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="fa-solid  fa-window-restore"></i>
            <span>Category</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa-solid fa-envelope"></i>
            <span>Messages</span>

          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa-solid fa-comment"></i>
            <span>Comments</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa-solid fa-cog"></i>
            <span>Settings</span>
          </a>
        </li>
        <li class="logout">
          <a href="logout.php">
            <i class="fa-solid fa-power-off"></i>
            <span>Logout</span>
          </a>
        </li>

      </ul>
    </nav>






    <section class="section-1">
      <div class="welcome-container">
        <h1>Welcome Back, <span>Shahar Yar</span></h1>
        <p>Here's what's happening with your dashboard today</p>
      </div>

      <!-- uay mray pass  -->
      <section class="section-2">
        <table class="table">
          <h3 class="mb-4"> Add Students <a href="" class="btn btn-success">Add New</a></h3>
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col"> Name</th>
              <th scope="col"> Email</th>
              <th scope="col"> Phone_Number</th>
              <th scope="col"> Class</th>
              <th scope="col"> Roll_Number</th>
              <th scope="col"> DOB</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- no main es ko add kar rah ahun jo main users ka table  main data hian jo user aa ka signup kya hian  -->

            @foreach ($data as $id => $student)
            <tr>
              <td>{{$student -> id}}</td>
              <td>{{$student -> name}}</td>
              <td>{{$student -> email}}</td>
              <td>{{$student -> phone}}</td>
              <td>{{$student -> class}}</td>
              <td>{{$student -> roll_number}}</td>
              <td>{{$student -> dob}}</td>
              <td> <a href="{{route('single-user-id',$student -> id)}}" class="btn btn-primary btn sm">View</a>

            <a href="" class="btn btn-danger btn sm">Delete</a>
          <a href="" class="btn btn-warning btn-sm">Update</a>
              </td>

            </tr>
            @endforeach


          </tbody>
        </table>
      </section>

      <!-- Edit User Modal -->
      {{-- jab hum data ko insert karain guy --}}

      <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="editUserForm">
              <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id" id="editUserId">
                <div class="mb-3">
                  <label for="editName" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="editName" required>
                </div>
                <div class="mb-3">
                  <label for="editEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="editEmail" required>
                </div>
                <div class="mb-3">
                  <label for="editEmailVerify" class="form-label">Email Verify</label>
                  <input type="text" class="form-control" name="email_verify" id="editEmailVerify" required>

                </div>


                <div class="mb-3">
                  <label for="editPassword" class="form-label">Password</label>
                  <input type="text" class="form-control" name="password" id="editPassword" required>
                </div>
                <div class="mb-3">
                  <label for="editStatus" class="form-label">Status</label>
                  <input type="text" class="form-control" name="status" id="editStatus" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>


    </section>



    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin.js')}}"></script>


</body>