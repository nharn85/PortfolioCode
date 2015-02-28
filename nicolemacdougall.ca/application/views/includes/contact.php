<!-- Contact Section -->
<section id="contact" class="content-section text-center">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <h2 class="contactHead">Contact me!</h2>
            <p class="contactText">Feel free to send me a message with any feedback or to just say hello!</p>

            <?php if($this->session->flashdata('error')): {?>
                <span class="errorMsg col-lg-10"><?php echo $this->session->flashdata('error')?></span>
            <?php } elseif($this->session->flashdata('success')) : { ?>
                <span class="successMsg col-lg-10"><?php echo $this->session->flashdata('success')?></span>
            <?php } endif; ?>

            <!-- Form -->
            <form name="contactform" method="post" action="<?php echo base_url('main/sendMail'); ?>" class="form-horizontal" role="form">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control empty" id="inputForm" name="inputName" placeholder="&#xf007; Name*" value="<?php if(isset($this->session->userdata['inputName'])){ echo $this->session->userdata['inputName'];}; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control empty" id="inputForm" name="inputEmail" placeholder="&#xf003; E-Mail*" value="<?php if(isset($this->session->userdata['inputEmail'])){ echo $this->session->userdata['inputEmail'];}; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control empty" id="inputForm" name="inputPhone" placeholder="&#xf095; Phone*" value="<?php if(isset($this->session->userdata['inputPhone'])){ echo $this->session->userdata['inputPhone'];}; ?>">
                            </div>
                        </div>
                    </div><!--div col-md-5-->
                    <div class="col-md-7">
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="form-control form-control-message empty" rows="6" id="inputForm message" name="inputMessage" placeholder="&#xf075; Message*"><?php if(isset($this->session->userdata['inputMessage'])){ echo $this->session->userdata['inputMessage'];}; ?></textarea>
                            </div>
                        </div>
                    </div><!--div col-md-7-->
                    <div class="col-md-6 widget">
                        <?php echo $widget;?>
                        <?php echo $script;?>
                        <br />
                    </div><!--div col-md-5-->
                    <div class="col-md-6">
                        <button type="submit" name="send" class="btn btn-primary btn-lg">
                            <i class="fa fa-paper-plane"></i> Send
                        </button>
                    </div><!--div col-md-7-->

                </div>
            </form>
        </div><!--div col-lg-10 col-lg-offset-1"-->
    </div><!--div row-->
</section>
<!-- Social Media Section -->
<div class="social gradient">
    <section class="text-center">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="http://ca.linkedin.com/in/nmacdougall1" class="btn btn-default btn-lg socialBtn" target="_blank"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">LinkedIn</span></a>
                    </li>
                    <li>
                        <a href="http://twitter.com/nmacd85" class="btn btn-default btn-lg socialBtn" target="_blank"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="http://instagram.com/nmacd85/" class="btn btn-default btn-lg socialBtn" target="_blank"><i class="fa fa-instagram fa-fw"></i> <span class="network-name">Instagram</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>
<!--<hr>-->
</div>