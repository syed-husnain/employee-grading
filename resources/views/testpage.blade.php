<html>
<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="{{asset('assets/select2/css/select2.min.css')}}" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <select class="form-select js-example-basic-single" id="single-select-field" data-placeholder="Choose one thing">
    <option></option>
    <option>Reactive</option>
    <option>Solution</option>
    <option>Conglomeration</option>
    <option>Algoritm</option>
    <option>Holistic</option>
</select>
        </div>
    </div>
</body>
<script>

 $(document).ready(function() {
      

            $(".nav-link").on("click", function(e) {
                e.preventDefault();

                // Remove active class from all tabs
                $(".nav-link").removeClass("active");
                $(this).addClass("active");

                // Hide all tab content
                $(".tab-pane").removeClass("show active");

                // Show the clicked tab content
                var target = $(this).data("bs-target");
                $(target).addClass("show active");
            });

            $(".js-example-basic-single").select2();

        });

</script>
</html>