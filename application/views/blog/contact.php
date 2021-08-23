<div class="page-content-wrapper sm-top">
        <div class="contact-page-content">
            <div class="contact-info-wrapper">
                <div class="container">
                    <div class="row mtn-30">
                        <div class="col-sm-6 col-lg-4">
                            <div class="contact-info-item">
                                <div class="con-info-icon">
                                    <i class="ion-ios-location-outline"></i>
                                </div>
                                <div class="con-info-txt">
                                    <h4>Our Location</h4>
                                    <p>#5, 5th Cross 24th Main
                                    H.S.R Layout
                                    Banglore-560102</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="contact-info-item">
                                <div class="con-info-icon">
                                    <i class="ion-iphone"></i>
                                </div>
                                <div class="con-info-txt">
                                    <h4>Contact us Anytime</h4>
                                    <p>Mobile: 9743608536 <br>
                                    Fax: 123 456 789</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="contact-info-item">
                                <div class="con-info-icon">
                                    <i class="ion-ios-email-outline"></i>
                                </div>
                                <div class="con-info-txt">
                                    <h4>Write Some Words</h4>
                                    <p>kirankumar9380@gmail.com
                                    &nbsp;
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrapper sm-top">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-form-content">
                                <h2>Get In Touch</h2>
                <?php if($this->session->flashdata('success')) :?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $this->session->flashdata('success')?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php endif;?>
                                <div class="contact-form-wrap">
                                    <form action="<?php echo base_url()?>contactform" method="post" id="contact-form">
                                        <div class="contact-form-inner">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <label class="sr-only" for="name">name</label>
                                                        <input type="text" name="name" id="name" placeholder="Name" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <label class="sr-only" for="email">email</label>
                                                        <input type="email" name="email" id="email" placeholder="Email" required />
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="input-item">
                                                        <label class="sr-only" for="subject">subject</label>
                                                        <input type="text" name="subject" id="subject" placeholder="Subject" required />
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="input-item">
                                                        <label class="sr-only" for="message">message</label>
                                                        <textarea name="message" id="message" cols="30" rows="8" placeholder="Write Message" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="input-item">
                                                        <button class="btn btn-brand">Send a Message</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Form Submission Notification -->
                                        <div class="form-message"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-map-wrapper sm-top">
                <div id="map_content" class="h-100" data-lat="23.7639212" data-lng="90.429871" data-zoom="7"></div>
            </div>
        </div>
    </div>
    <!--== End Page Content Wrapper ==-->
