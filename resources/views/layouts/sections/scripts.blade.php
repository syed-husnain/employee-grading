<!-- BEGIN: Vendor JS-->

@vite([
  
  'resources/assets/vendor/libs/popper/popper.js',
  'resources/assets/vendor/js/bootstrap.js',
  'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
  'resources/assets/vendor/js/menu.js'
])

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
@vite(['resources/assets/js/main.js'])

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->


<!-- Bootstrap 5 (Popper + Bootstrap JS bundle) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

{{-- date range picker --}}

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.3/js/dataTables.bootstrap5.js"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}


<script>
  function errorsGetNew(errors) {
    console.log(errors);
    $('div.invalid-feedback').remove();
    for (const x in errors) {
        console.log(x, errors[x]);
        var formGroup = $('.errors[data-id="' + x + '"],input[name="' + x + '"],select[name="' + x + '"],textarea[name="' + x + '"]').parent();
        for (const item in errors[x]) {
            formGroup.append(' <div class="invalid-feedback d-block" role="alert">' + errors[x][item] + '</div>');
        }
    }
  }
  function showToast(message, title = "Notification", type = "primary") {
      let toastEl = document.getElementById('generalToast');
      let toastTitle = document.getElementById('toastTitle');
      let toastMessage = document.getElementById('toastMessage');
      let toastTime = document.getElementById('toastTime');

      // set message & title
      toastTitle.innerText = title;
      toastMessage.innerHTML = message;
      toastTime.innerText = "Just now";

      // color reset & apply
      toastEl.classList.remove('bg-primary', 'bg-success', 'bg-danger', 'bg-warning');
      toastEl.classList.add('bg-' + type);

      // Bootstrap toast instance
      let toast = new bootstrap.Toast(toastEl, {
          delay: 3000 // 3 sec auto-hide
      });
      toast.show();
  }
  $(document).ready(function () {
    $('.select2').select2({
        placeholder: function(){
            return $(this).data('placeholder') || 'Select an option';
        },
        allowClear: true,
        width: '100%' // responsive dropdown
    });

    // change password
    $('#changePasswordForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('users.change-password') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function (res) {
                if (res.status) {
                    showToast(res.message, "Success", "primary");
                    setTimeout(() => {
                        window.location.reload();
                    }, 
                    3000);
                    
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    errorsGetNew(xhr.responseJSON.errors);
                } else {
                    $('#passwordAlert').html(
                        `<div class="alert alert-danger">Something went wrong!</div>`
                    );
                }
            }
        });
    });


  });
</script>
@yield('page-script')
<!-- END: Page JS-->
