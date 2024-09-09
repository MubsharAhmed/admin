<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
            <small>Control panel</small>
        </h1>
    </section>

    <style>
        .small-box {
            background-color: #3C8DBC;
            color: white;
        }
    </style>


    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box">
                    <div class="inner text-center">  
                        <h3>General</h3>   
                        <p>Setting</p>                   
                        
                    </div>
                    <div class="icon">
                        <i class="fa fa-wrench"></i>
                    </div>
                    <a href="<?=base_url('general/generalSetting')?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-primary">
                    <div class="inner text-center">
                        <h3>Home</h3>
                        <p>Setting</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-wrench"></i>
                    </div>
                    <a href="<?=base_url('general/home')?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-primary">
                    <div class="inner text-center">
                        <h3>About</h3>
                        <p>Setting</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-wrench"></i>
                    </div>
                    <a href="<?=base_url('general/aboutUs')?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-primary">
                    <div class="inner text-center">
                        <h3>Services</h3>
                        <p>Setting</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-wrench"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>general/services" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-primary">
                    <div class="inner text-center">
                        <h3>Case Studies</h3>
                        <p>Setting</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-wrench"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>general/caseStudies" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-primary">
                    <div class="inner text-center">  
                        <h3>Price & Package</h3>   
                        <p>Setting</p>                   
                        
                    </div>
                    <div class="icon">
                        <i class="fa fa-wrench"></i>
                    </div>
                    <a href="<?=base_url('general/pricepackage')?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>