<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Detail</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    /* Custom styles for the modal */
    .modal-content {
      border: none;
      border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }
    
    .modal-header {
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      color: white;
      border-bottom: none;
      padding: 1.5rem;
    }
    
    .modal-title {
      font-weight: 600;
      font-size: 1.5rem;
    }
    
    .btn-close {
      filter: invert(1);
      opacity: 0.8;
    }
    
    .btn-close:hover {
      opacity: 1;
    }
    
    .modal-body {
      padding: 2rem;
    }
    
    .modal-body p {
      margin-bottom: 1rem;
      font-size: 1.1rem;
      display: flex;
      border-bottom: 1px solid #f0f0f0;
      padding-bottom: 0.5rem;
    }
    
    .modal-body strong {
      min-width: 120px;
      color: #555;
      font-weight: 500;
    }
    
    .modal-footer {
      border-top: none;
      background-color: #f9f9f9;
      padding: 1rem 2rem;
    }
    
    .btn-secondary {
      background-color: #6c757d;
      border: none;
      padding: 0.5rem 1.5rem;
      border-radius: 5px;
      transition: all 0.3s;
    }
    
    .btn-secondary:hover {
      background-color: #5a6268;
      transform: translateY(-2px);
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    /* Backdrop styling */
    .modal-backdrop {
      background-color: rgba(0, 0, 0, 0.5);
    }
    
    /* Animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .modal.fade.show .modal-dialog {
      animation: fadeIn 0.3s ease-out;
    }
  </style>
</head>
<body>
@php
    $student = $student->first();
@endphp

<!-- Modal -->
<div class="modal fade show" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" style="display: block;" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Student Details</h1>
        <a href="{{ url()->previous() }}" class="btn-close" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        <p><strong>ID:</strong> <span>{{ $student->id }}</span></p>
        <p><strong>Name:</strong> <span>{{ $student->name }}</span></p>
        <p><strong>Email:</strong> <span>{{ $student->email }}</span></p>
        <p><strong>Phone:</strong> <span>{{ $student->phone }}</span></p>
        <p><strong>Class:</strong> <span>{{ $student->class }}</span></p>
        <p><strong>Roll Number:</strong> <span>{{ $student->roll_number }}</span></p>
        <p><strong>DOB:</strong> <span>{{ $student->dob }}</span></p>
      </div>
      <div class="modal-footer">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Close</a>
      </div>
    </div>
  </div>
</div>

<!-- Auto Trigger Modal -->
<script>
  const modal = new bootstrap.Modal(document.getElementById('studentModal'));
  modal.show();
  
  // Add backdrop
  const backdrop = document.createElement('div');
  backdrop.className = 'modal-backdrop fade show';
  document.body.appendChild(backdrop);
  
  // Remove backdrop when closing
  document.querySelector('.btn-secondary, .btn-close').addEventListener('click', function() {
    document.body.removeChild(backdrop);
  });
</script>

</body>
</html>