<!--parallax 1 -->
<section class="bg-1 text-center">
    <h1 class="portfolioHead">Trailer Rating App</h1>
    <p class="portfolioHead2">Eclipse &bull; Android XML &bull; Java &bull; SQLite &bull; Data Persistence <br />Hashmap &bull; Arraylists</p>
</section>
<!--/parallax 1-->


<div class="container-fluid content-section page-content">

    <div class="col-lg-5 col-md-5">
        <h1>Project Details:</h1>
        <p>This project required an app to be built that would display a list of movie posters with their titles. When a movie was clicked, the app would
        go to the next screen to display more details of the movie, a last saved user rating, and a delete button. Next, if you clicked on the poster, you would
        be sent to the next screen to show the corresponding trailer with pause, play and stop functions. These functions were also meant to be hand coded and not
        make use of third-party apps.</p>
        <h1 class="specs">Project Specs:</h1>
        <ul class="specsList">
            <li>
                <span>Date:</span> December 2014
            </li>
            <li>
                <span>Company:</span> NSCC - Android Developement
            </li>
            <li>
                <span>Skills / Tools Used:</span> Eclipse &bull; Android XML &bull; Java &bull; SQLite &bull; Data Persistence &bull; Hashmap &bull; Arraylists
            </li>
        </ul>
    </div>

    <div class="col-lg-7 col-md-7 content-area">

        <div class="row"><!-- row for column -->
            <div class="text-center container-fluid">

                <div class="row">
                    <p>As part of this assignment, we needed to create a wireframe to convey our design.
                        It was also required that we use intents to navigate from page to page.</p>
                </div><!--end row-->

                <div class="row">
                    <img src="<?php echo site_url('assets/img/trailerRatingApp/wireframe.jpg');?>" alt="trailer rating app sketch"/>
                </div><!--end row-->

                <div class="row">
                    <p>As we were focused on using multiple Android tools, the UX isn't the greatest. Though, for my 3rd Android app ever I was happy.</p>
                </div><!--end row-->

                <div class="row">

                    <div class="col-lg-3 col-med-6 col-sm-6" id="paddBottom">
                        <img src="<?php echo site_url('assets/img/trailerRatingApp/main-screen.png');?>" style="height: 10%" alt="splash page"/>
                    </div>
                    <div class="col-lg-3 col-med-6 col-sm-6" id="paddBottom">
                        <img src="<?php echo site_url('assets/img/trailerRatingApp/info-screen.png');?>" alt="splash page 2"/>
                    </div>
                    <div class="col-lg-3 col-med-6 col-sm-6">
                        <img src="<?php echo site_url('assets/img/trailerRatingApp/trailer-screen.png');?>" alt="splash page 2"/>
                    </div>
                    <div class="col-lg-3 col-med-6 col-sm-6">
                        <img src="<?php echo site_url('assets/img/trailerRatingApp/add-screen.png');?>" alt="splash page 2"/>
                    </div>
                </div>

                <div class="row">
                    <p>We built our database using SQLite and data persistence methods. Within the database, we stored the trailer title, director, release date,
                        user rating and file name. In doing so, this allowed me to build CRUD methods to use in displaying information to the user,
                        being able to add to the database, update the user rating, and delete a trailer.</p>
                    <p>I had a few mishaps with building this application. When trying to perform an update on the database, I had forgotten to connect to it first.
                    If you don't know databases, think of trying to save a word document without opening a new file. However, once I had that corrected I was able to
                    finish the app easily.</p>
                </div>

                <div class="row">
                    <p></p>
                </div><!--end row-->

                <div class="row">
                    <h2 id="final">The final product!</h2>
                    <p>And this is my final app. It's not Google Play store ready, but I like the end result.</p>
                    <img src="<?php echo site_url('assets/img/trailerRatingApp/movieTrailerAppMockup.jpg');?>" alt="finished business card"/>
                </div>

            </div><!--end container-->
        </div><!--end row-->
    </div>

</div><!--/container-->
