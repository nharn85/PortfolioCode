<!--parallax 1 -->
<section class="bg-1 text-center">
    <h1 class="portfolioHead">Quizzer App</h1>
    <p class="portfolioHead2">Eclipse &bull; Android XML &bull; Java <br />Hashmap &bull; Arraylists &bull; File I/O &bull; Intents</p>
</section>
<!--/parallax 1-->


<div class="container-fluid content-section page-content">

    <div class="col-lg-5 col-md-5">
        <h1>Project Details:</h1>
        <p>This app can create a quiz for you out of a .txt file using a designated delimiter. Upon entering a valid name, your questions from the
        file will be shuffled and displayed one at a time along with the correct answer, and 3 incorrect answers. After you choose your answer you will
        see a display message noting if you got the question right or not, and you will move onto the next question. This same loop will happen until all the questions
        are completed and you are given a score at the end. You then have the option to play again.</p>
        <h1 class="specs">Project Specs:</h1>
        <ul class="specsList">
            <li>
                <span>Date:</span> November 2014
            </li>
            <li>
                <span>Company:</span> NSCC - Android Developement
            </li>
            <li>
                <span>Skills / Tools Used:</span> Eclipse &bull; Android XML &bull; Java &bull; Hashmap &bull; Arraylists &bull; File I/O &bull; Intents
            </li>
        </ul>
    </div>
    
    <div class="col-lg-7 col-md-7 content-area">

        <div class="row"><!-- row for column -->
            <div class="text-center container-fluid">

                <div class="row">
                    <div class="col-lg-4">
                        <p>This assignment required a name to carry though to the final score screen, so within the textview I validated for letters only.
                            Numbers and symbols were invalid.</p>
                    </div>
                    <div class="col-lg-4 col-med-6 col-sm-6 hidden-xs">
                        <img src="<?php echo site_url('assets/img/quizzerApp/splashScreen.png');?>" alt="splash screen"/>
                    </div>
                    <div class="col-lg-4 col-med-6 col-sm-6">
                        <img src="<?php echo site_url('assets/img/quizzerApp/splashScreenValidation.png');?>" alt="validation"/>
                    </div>
                </div>

                <div class="row">
                    <p>To build the quiz, we had to have a .txt file set up with key:value pairs. We then had to parse through the file to create a hash map to be used
                        upon entering the quiz. The hashmap was used to keep the pairs together as we had to shuffle the questions upon the app loading.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-med-4 col-sm-4">
                        <img src="<?php echo site_url('assets/img/quizzerApp/correctToast.png');?>" alt="toast"/>
                    </div>
                    <div class="col-lg-4 col-med-4 col-sm-4">
                        <img src="<?php echo site_url('assets/img/quizzerApp/incorrectToast.png');?>" alt="toast"/>
                    </div>
                    <div class="col-lg-4 col-med-4 col-sm-4">
                        <p>The user would choose an answer and while moving to the next question, they get a toast message letting them know if they were correct or not.
                            For easy recognition, I coloured the background of the message the standard green for correct and red for incorrect.</p>
                    </div>
                </div>

                <div class="row">
                    <p></p>
                </div><!--end row-->

                <div class="row">
                    <h2 id="final">The final product!</h2>
                    <p>While creating this app, I didn't realize how useful it would be to me. <br />After it was handed in, I re-worked the .txt file to help me study for
                    future Android terminology quizzes.</p>
                    <img src="<?php echo site_url('assets/img/quizzerApp/score-mock.jpg');?>" alt="finished quizzer app"/>
                </div>

            </div><!--end container-->
        </div><!--end row-->
    </div><!--end content-area-->
</div><!-- end page-content -->
