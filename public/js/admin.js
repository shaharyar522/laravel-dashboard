 //-- uay hamray pass sweet alert message hian jo kay use hnta hian 
   


$(document).ready(function() {
      $('.delete-btn').click(function() {
        var userId = $(this).data('id'); // Get user ID from button

        Swal.fire({
          title: 'Are you sure?',
          text: "You want to delete this user?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            // AJAX call to delete_user.php
            $.ajax({
              url: 'data/delete_user.php', // path to your PHP handler
              type: 'POST',
              data: {
                id: userId
              },
              success: function(response) {
                if (response.trim() === 'success') {
                  Swal.fire('Deleted!', 'User has been deleted.', 'success');
                  setTimeout(() => {
                    location.reload(); // Reload the page to reflect changes
                  }, 1000);
                } else {
                  Swal.fire('Error!', 'Could not delete user.', 'error');
                }
              },
              error: function() {
                Swal.fire('Error!', 'AJAX request failed.', 'error');
              }
            });
          }
        });
      });
    });


// or uay hamray pass  ajax hain user.php ka -->

     $(document).ready(function() {
      // Show modal and populate fields
      $('.edit-btn').click(function() {
        $('#editUserId').val($(this).data('id'));
        $('#editName').val($(this).data('name'));
        $('#editEmail').val($(this).data('email'));
        $('#editEmailVerify').val($(this).data('emailverify'));
        $('#editPassword').val($(this).data('password'));
        $('#editStatus').val($(this).data('status'));

        $('#editUserModal').modal('show');
      });

      // Handle form submission
      $('#editUserForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
          url: 'data/update_user.php',
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            console.log("Server Response:", response); // ✅ DEBUG this line

            if (response.trim() === 'success') {
              $('#editUserModal').modal('hide');
              Swal.fire('Updated!', 'Your record has been updated.', 'success');
              setTimeout(() => {
                location.reload();
              }, 1200);
            } else {
              Swal.fire('Error!', 'Update failed: ' + response, 'error'); // ✅ show backend error
            }
          },
          error: function() {
            Swal.fire('Error!', 'AJAX error occurred.', 'error');
          }
        });
      });
    });