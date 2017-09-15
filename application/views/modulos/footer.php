
                <!-- Footer
        ================================================== -->
        <div id="footer">
            <!-- Main -->
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <img class="footer-logo" src="<?php echo base_url('estatico/images/logo.png'); ?>" alt="Gaia">
                        <br><br>
                        <p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
                    </div>

                    <div class="col-md-4 col-sm-6 ">
                        <h4>Helpful Links</h4>
                        <ul class="footer-links">
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Sign Up</a></li>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Add Listing</a></li>
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>

                        <ul class="footer-links">
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Our Partners</a></li>
                            <li><a href="#">How It Works</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-3  col-sm-12">
                        <h4>Contact Us</h4>
                        <div class="text-widget">
                            <span>12345 Little Lonsdale St, Melbourne</span>
                            <br> Phone: <span>(123) 123-456 </span>
                            <br> E-Mail:
                            <span> <a href="#">office@example.com</a> </span><br>
                        </div>

                        <ul class="social-icons margin-top-20">
                            <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                            <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                            <li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyrights"><?php echo lang('f_1', date('Y')) ?></div>
                    </div>
                </div>

            </div>

        </div>
        <!-- Footer / End -->


        <!-- Back To Top Button -->
        <div id="backtotop">
            <a href="#"></a>
        </div>


    </div>
    <!-- Wrapper / End -->

    <!-- Scripts
    ================================================== -->
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/jquery-2.2.0.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/jpanelmenu.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/chosen.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/slick.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/rangeslider.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/magnific-popup.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/waypoints.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/counterup.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/tooltips.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/custom.js'); ?>"></script>

    <!-- Maps -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAy5XdG1pK5ZEAHazQ_jiuBCFD4ORHLUus&amp;language=es"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/infobox.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/markerclusterer.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('estatico/scripts/maps.js'); ?>"></script>

    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script type="text/javascript">
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            "dateLimit": {
                "days": 365
            },
            locale: {
                format: 'YYYY-MM-DD',
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "daysOfWeek": [
                    "Su",
                    "Mo",
                    "Tu",
                    "We",
                    "Th",
                    "Fr",
                    "Sa"
                ],
                "monthNames": [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ]
            },
            "startDate": "2017-08-18",
            "endDate": "2017-08-18"
        });
    });
    </script>
</body>
</html>