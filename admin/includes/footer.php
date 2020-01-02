<script src="app/lib/jquery/jquery.min.js"></script>
<script src="app/lib/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="app/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="app/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="app/lib/moment/min/moment.min.js"></script>
<script src="app/lib/peity/jquery.peity.min.js"></script>
<script src="app/lib/rickshaw/vendor/d3.min.js"></script>
<script src="app/lib/rickshaw/vendor/d3.layout.min.js"></script>
<script src="app/lib/rickshaw/rickshaw.min.js"></script>
<script src="app/lib/jquery.flot/jquery.flot.js"></script>
<script src="app/lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="app/lib/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="app/lib/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="app/lib/echarts/echarts.min.js"></script>
<script src="app/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="app/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="app/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="app/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
<script src="app/lib/select2/js/select2.full.min.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-app8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>
<script src="app/lib/gmaps/gmaps.min.js"></script>
<script src="app/js/bracket.js"></script>
<script src="app/js/map.shiftworker.js"></script>
<script src="app/js/ResizeSensor.js"></script>
<script src="app/js/dashboard.js"></script>
<script>
    $(function () {
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function () {
            minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
            if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                // show only the icons and hide left menu label by default
                $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                $('body').addClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideUp();
            } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                $('body').removeClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideDown();
            }
        }

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
</script>
</body>
</html>
