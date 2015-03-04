
<!-- Footer -->
<footer>
    <div class="container-fluid footerText">
        <p>&copy;<script>document.write(new Date().getFullYear())</script> - Designed and developed with <i class="fa fa-heart wow pulse" data-wow-iteration="infinite" data-wow-duation="400ms"></i> by Nicole MacDougall</p>
    </div>
</footer>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Custom Theme JavaScript -->
<script type="text/javascript" src="<?php echo site_url('assets/js/grayscale.js'); ?>"></script>

<!-- WOW.js -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/wow/1.0.3/wow.min.js"></script>
<script>new WOW().init();</script>

<!-- Custom JavaScript -->
<script src="<?php echo site_url('assets/js/custom.js'); ?>"></script>

<!--  Google Analytics  -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-59666621-1', 'auto');
    ga('send', 'pageview');
</script>
<!-- Preloader -->
<script type="text/javascript">
    $(document).ready(function() {
        $(window).load(function () { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').fadeOut(function(){ $(this).remove(); }); // will fade out the white DIV that covers the website.
            $('body').css({'overflow': 'visible'});
            $(this).remove();
        });
    });
</script>

</body>
</html>