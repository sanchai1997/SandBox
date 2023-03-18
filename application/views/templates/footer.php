<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.min.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>


<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Multiple Dropdown PROVINCE DISTRICT SUBDISTRICT -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function() {
    $("#DISTRICT").children('option:gt(0)').hide();
    $("#SUBDISTRICT").children('option:gt(0)').hide();

    $("#PROVINCE").change(function() {
      $("#DISTRICT").children('option').hide();
      $("#DISTRICT").children("option[ id^=" + $(this).val() + "]").show()
    })

    $("#DISTRICT").change(function() {
      $("#SUBDISTRICT").children('option').hide();
      $("#SUBDISTRICT").children("option[ id^=" + $(this).val() + "]").show()
    })
    /////////////////////////////////////////////////////////////////////////////////////////////
    $("#Student").children('option:gt(0)').hide();
    $("#School").change(function() {
      $("#Student").children('option').hide();
      $("#Student").children("option[ id^=" + $(this).val() + "]").show()
    })
    /////////////////////////////////////////////////////////////////////////////////////////////

  })
</script>
</body>

</html>