<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Update Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="POST" action="{{route('update_student_record',$student->id)}}">
        @csrf
        @method('PUT')
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="updateModalLabel">Update Student</h5>

          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $student->name }}">
            </div>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $student->email }}">
            </div>
            <div class="mb-3">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" name="phone" value="{{ $student->phone }}">
            </div>
            <div class="mb-3">
              <label for="class">Class</label>
              <input type="text" class="form-control" name="class" value="{{ $student->class }}">
            </div>
            <div class="mb-3">
              <label for="roll_number">Roll Number</label>
              <input type="text" class="form-control" name="roll_number" value="{{ $student->roll_number }}">
            </div>
            <div class="mb-3">
              <label for="dob">DOB</label>
              <input type="date" class="form-control" name="dob" value="{{ $student->dob }}">
            </div>
          </div>
          <div class="modal-footer">
            <div class="modal-footer">
              <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>

            </div>

            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Auto Trigger Modal on Page Load -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const modal = new bootstrap.Modal(document.getElementById('updateModal'));
    modal.show();
  });
  </script>

  @if(session('showUpdateModal'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const modal = new bootstrap.Modal(document.getElementById('updateModal'));
      modal.show();
    });
  </script>
  @endif






</body>

</html>