<!--Footer-->
<footer class=" text-center text-md-left pt-4">

  <!--Footer Links-->
  <div class="container-fluid">


    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        © 2019 Copyright: <a href=""> Muhammad Fauzan Saputra </a>

      </div>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->


<!-- SCRIPTS -->

<!-- JQuery -->

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('mdbpro/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('mdbpro/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('mdbpro/js/mdb.min.js')}}"></script>
<script type="text/javascript" src="{{asset('mdbpro/js/main.js')}}"></script>

<script type="text/javascript" src="{{asset('mdbpro/js/addons-pro/stepper.min.js')}}"></script>
<script src="{{ asset('dashboard/select2/select2.min.js') }}"></script>
<script src="{{ asset('dashboard/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script>


  // Material Select Initialization
  $(document).ready(function() {
    $('.mdb-select').materialSelect();
  });


  $(function () {
    $('.material-tooltip-main').tooltip({
      template: '<div class="tooltip md-tooltip-main"><div class="tooltip-arrow md-arrow"></div><div class="tooltip-inner md-inner-main"></div></div>'
    });
  })


  $(document).ready(function () {
    $('.stepper').mdbStepper();
  })

  function someFunction22() {
    setTimeout(function () {
      $('#horizontal-stepper-fix').nextStep();
    }, 2000);
  }


// SideNav Initialization
$(".button-collapse").sideNav();

new WOW().init();
</script>


</body>

</html>
