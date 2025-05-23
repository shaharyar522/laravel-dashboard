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
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Animate.css for custom animation -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" />

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

        <img src="{{ asset('images/Profile picture.png') }}" alt="Admin">


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
          <h3 class="mb-4">
            Add Students
            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add New</a>
          </h3>
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
              <td>{{$loop->iteration }}</td>
              <td>{{$student -> name}}</td>
              <td>{{$student -> email}}</td>
              <td>{{$student -> phone}}</td>
              <td>{{$student -> class}}</td>
              <td>{{$student -> roll_number}}</td>
              <td>{{$student -> dob}}</td>
              <td>
                <a href="{{ route('single-user-id', $student->id) }}"
                  class="btn btn-info btn-sm d-inline-flex align-items-center">
                  <i class="fas fa-eye me-1"></i> View
                </a>


                <a href="{{ route('students.edit', $student->id) }}"
                  class="btn btn-warning btn-sm d-inline-flex align-items-center">
                  <i class="fas fa-pen me-1"></i> Edit
                </a>
                <a href="{{ route('student_recod_delete', $student->id) }}"
                  class="btn btn-danger btn-sm delete-btn d-inline-flex align-items-center" data-id="{{ $student->id }}"
                  data-name="{{ $student->name }}">
                  <i class="fas fa-trash me-1"></i> Delete
                </a>

                
              </td>

            </tr>
            @endforeach


          </tbody>
        </table>
      </section>



      {{-- add student add buttun then this model can open --}}

      <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h1 class="modal-title fs-4" id="addStudentModalLabel">Add Student Data</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form id="studentForm" action="{{ route('add-student')}}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="student_name" required>
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="student_email" required>
                </div>

                <div class="mb-3">
                  <label for="phone" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" id="phone" name="student_phone" required>
                </div>

                <div class="mb-3">
                  <label for="class" class="form-label">Class</label>
                  <input type="text" class="form-control" id="class" name="student_class" required>
                </div>

                <div class="mb-3">
                  <label for="roll" class="form-label">Roll Number</label>
                  <input type="text" class="form-control" id="roll" name="student_roll" required>
                </div>

                <div class="mb-3">
                  <label for="dob" class="form-label">DOB</label>
                  <input type="date" class="form-control" id="dob" name="student_dob" required>
                </div>
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" form="studentForm" class="btn btn-primary">Submit</button>
            </div>

          </div>
        </div>
      </div>
    </section>



    <!-- SweetAlert2 -->

    <script src="{{ asset('js/admin.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
      @if (session('status') === 'success')
        Swal.fire({
            icon: 'success',
            title: 'Student Added',
            text: 'The student has been added successfully!',
            timer: 3000,
            showConfirmButton: false
        });
    @elseif (session('status') === 'error')
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong',
            text: 'Please try again.',
            timer: 3000,
            showConfirmButton: false
        });
    @elseif (session('status') === 'email_exists')
        Swal.fire({
            icon: 'warning',
            title: 'Email Already Exists',
            text: 'This email is already registered.',
            timer: 3000,
            showConfirmButton: false
        });
    @elseif (session('status') === 'roll_exists')
        Swal.fire({
            icon: 'warning',
            title: 'Roll Number Exists',
            text: 'This roll number is already registered.',
            timer: 3000,
            showConfirmButton: false
        });
    @endif
    </script>







    <script>
      @if(session('status') === 'deleted')
        Swal.fire({
            icon: 'success',
            title: 'Deleted!',
            text: 'The record has been deleted successfully.',
            timer: 2000,
            showConfirmButton: false
        });
    @elseif(session('status') === 'not_deleted')
        Swal.fire({
            icon: 'error',
            title: 'Failed!',
            text: 'The record could not be deleted.',
        });
    @endif
    </script>


    {{-- delete sweet alert message --}}

    <script>
      $(document).ready(function () {
    $('.delete-btn').on('click', function (e) {
      e.preventDefault(); // Stop the link from navigating immediately

      let link = $(this).attr('href');
      let studentName = $(this).data('name') || 'this record';

      Swal.fire({
        title: 'Are you sure?',
        text: `Do you want to delete ${studentName}? This action cannot be undone.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link; // Now do the deletion
        }
      });
    });
  });
    </script>

    @if(session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK'
    });
    </script>
    @endif

    @if(session('error'))
    <script>
      Swal.fire({
        icon: 'info',
        title: 'No Update',
        text: '{{ session('error') }}',
        confirmButtonText: 'OK'
    });
    </script>
    @endif











    {{-- edit model --}}


    @if(session('showUpdateModal') && session('student'))
    @php
    $student = session('student');
    @endphp

    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form method="POST" action="{{ route('update_student_record', $student['id']) }}">
          @csrf
          @method('PUT')
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="updateModalLabel">Update Student</h5>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $student['name'] }}">
              </div>
              <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $student['email'] }}">
              </div>
              <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $student['phone'] }}">
              </div>
              <div class="mb-3">
                <label for="class">Class</label>
                <input type="text" class="form-control" name="class" value="{{ $student['class'] }}">
              </div>
              <div class="mb-3">
                <label for="roll_number">Roll Number</label>
                <input type="text" class="form-control" name="roll_number" value="{{ $student['roll_number'] }}">
              </div>
              <div class="mb-3">
                <label for="dob">DOB</label>
                <input type="date" class="form-control" name="dob" value="{{ $student['dob'] }}">
              </div>
            </div>
            <div class="modal-footer">
              <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Show modal only when session flag is set -->
    <script>
      document.addEventListener('DOMContentLoaded', function () {
      const modal = new bootstrap.Modal(document.getElementById('updateModal'));
      modal.show();
    });
    </script>
    @endif




</body>