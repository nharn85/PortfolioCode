<!--parallax 1 -->
<section class="bg-1 text-center">
    <h1 class="portfolioHead">Chinook Music Store</h1>
    <p class="portfolioHead2">HTML5 &bull; CSS3 &bull; JS<br />3-Tier PHP &bull; MySQL &bull; AJAX</p>

</section>
<!--/parallax 1-->


<div class="container-fluid content-section page-content">

    <div class="col-lg-5 col-md-5">
        <h1>Project Details:</h1>
        <p>For this project, we needed to create a secure login that would lead into the Chinook "music store" and display a table
        of tracks and their respective information. In addition you were able to add a track to the cart using a session based cart method.</p>
        <p>It was also required to add an AJAX type of search, and an additional feature to enhance the experience. I was able to implement the datatables plug-in
        and a tooltip effect to show the album that the track was from.</p>

        <h1 class="specs">Project Specs:</h1>
        <ul class="specsList">
            <li>
                <span>Date:</span> December 2014
            </li>
            <li>
                <span>Company:</span> NSCC - PHP Class
            </li>
            <li>
                <span>Skills / Tools Used:</span> HTML5 &bull; CSS3 &bull; JS &bull; 3-Tier PHP &bull; MySQL &bull; AJAX
            </li>
        </ul>
    </div>

    <div class="col-lg-7 col-md-7 content-area">

        <div class="row"><!-- row for column -->
            <div class="text-center container-fluid">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <img src="<?php echo site_url('assets/img/chinookMusicStore/chinookCode.png');?>" alt="code from login"/>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <p>This is the inital login code you get to, and its function that checks if you're a valid user.</p>
                        <img src="<?php echo site_url('assets/img/chinookMusicStore/chinookCode2.png');?>" alt="code from login"/>
                    </div>
                </div><!--end row-->

                <div class="row">
                    <p>The function uses the data layer
                        to query the database and if you have 1 row result, you would be a valid user. That is sent back to the presentation layer and allows the user
                        to see the next page.</p>
                </div><!--end row-->

                <div class="row">
                    <img src="<?php echo site_url('assets/img/chinookMusicStore/chinookMusicStoreAjaxSearch.png');?>" alt="ajax"/>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-med-6 col-sm-6">
                        <img src="<?php echo site_url('assets/img/chinookMusicStore/chinookMusicStoreCart.png');?>" alt="ajax"/>
                    </div>
                    <div class="col-lg-6 col-med-6 col-sm-6">
                        <p>As datatables has Ajax built in, you can see the search for 'red hot' was successful in searching all fields for
                            those words individually.</p>
                        <p>The cart doesn't look like much but I was able to successfully add to the cart and get a total.</p>
                    </div>
                </div><!--end row-->

                <div class="row">
                    <h2 id="final">The final product!</h2>
                    <p>I was able to implement all the necessary functionality to make a partially working e-commerce store. Partially, because
                    a payment method and additional user information was not required at this time.</p>
                    <img src="<?php echo site_url('assets/img/chinook-img.jpg');?>" alt="chinook finished"/>
                </div>

            </div><!--end container-->
        </div><!--end row-->
    </div><!--end content-area-->
</div><!-- end page-content -->
