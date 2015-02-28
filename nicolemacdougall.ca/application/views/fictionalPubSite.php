<!--parallax 1 -->
<section class="bg-1 text-center">
    <h1 class="portfolioHead">Fictional Pub Site</h1>
    <p class="portfolioHead2">HTML5 &bull; CSS3 &bull; JS &bull; Foundation</p>
</section>
<!--/parallax 1-->


<div class="container-fluid content-section page-content">

    <div class="col-lg-5 col-md-5">
        <h1>Project Details:</h1>
        <p>This is a website for a fictional pub called Growling Bear Brew Pub. This site was my first time using the Foundation framework. As it's similar to
        bootstrap, it doesn't have as many features built in so I found myself tyring to implement features from past projects.</p>
        <p>We started with a need assessment, moved into wireframing and prototyping, then finally building the site.
            It was a great learning experience as our instructor played the part of the client and would have us change things along the way, as clients tend to do.
        </p>

        <h1 class="specs">Project Specs:</h1>
        <ul class="specsList">
            <li>
                <span>Date:</span> December 2014
            </li>
            <li>
                <span>Company:</span> NSCC - Web Design Class
            </li>
            <li>
                <span>Skills / Tools Used:</span> HTML5 &bull; CSS3 &bull; JS &bull; Foundation
            </li>
            <li>
                <span>Website:</span> <a href="http://www.nicolemacdougall.ca/growlingbear" target="_blank">Growling Bear Brew Pub</a>
            </li>
        </ul>
    </div>

    <div class="col-lg-7 col-md-7 content-area">

        <div class="row"><!-- row for column -->
            <div class="text-center container-fluid">

                <div class="row">
                    <p>As this was mimicking a client experience, after our needs assessment was complete, we moved onto wireframing.</p>
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="<?php echo site_url('assets/img/growlingBear/home.png');?>" alt="wireframe"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="<?php echo site_url('assets/img/growlingBear/about.png');?>" alt="wireframe"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="<?php echo site_url('assets/img/growlingBear/menu.png');?>" alt="wireframe"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="<?php echo site_url('assets/img/growlingBear/beer.png');?>" alt="wireframe"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="<?php echo site_url('assets/img/growlingBear/entertainment.png');?>" alt="wireframe"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="<?php echo site_url('assets/img/growlingBear/contact.png');?>" alt="wireframe"/>
                    </div>
                </div>

                <div class="row">
                    <p>Once wireframes were complete and feedback from our "client" was given, we then moved into prototyping. As this was a
                        mock client site, we only prepared one site design and layout for them to choose. Normally, at least 2 would be given.</p>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <img src="<?php echo site_url('assets/img/growlingBear/logo.png'); ?>" id="brewLogo" alt="logo"/>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <p>I also did a simple logo for the site. This idea came to me as most beer companies logos are round to go on bottles, and while this was a pub, they also
                        specialized in making their own beer as well.</p>
                    </div>
                </div><!--end row-->

                <div class="row">
                    <h2 id="final">The final product!</h2>
                    <p>As I tried something new for this project, the full responsiveness wasn't there since I was just learning the framework.
                        However, I am glad that I decided to learn Foundation as it is a smaller framework, it will work great for smaller sites.s</p>
                    <img src="<?php echo site_url('assets/img/growlingBear/growlingMock.jpg');?>" alt="finished pub site"/>
                </div>

            </div><!--end container-->
        </div><!--end row-->
    </div><!--end content-area-->
</div><!-- end page-content -->
