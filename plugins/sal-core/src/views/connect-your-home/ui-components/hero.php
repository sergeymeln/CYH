<?php /* @var $hero \CYH\ViewModels\UI\HeroItem */ ?>
<section class="hero">
    <div class="bottom-border">
        <div class="col-md-8 brand-intro hero-holder">
            <div class="masthead">
                <img src="<?php echo $hero->HeroImageUrl; ?>" alt="Hero Image"/>
            </div>
            <!-- /.masthead -->
        </div>
        <!-- /.col-md-12 -->
        <div class="col-md-4 brand-intro">
            <div class="masthead">
                <div class="banner-msg">
                    <h2><?php echo $hero->Heading; ?></h2>
                    <p><?php echo $hero->HeadingIntro; ?></p>
                    
                    <div class="row service-cta">
                        <div class="col-md-12 ">
                            <div class="banner-msg">
                                <?php
                                switch ($hero->HeroMsgRenderMode)
                                {
                                    case \CYH\ViewModels\RenderMode::DYNAMIC:
                                         do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $hero->HeroMsg, 'common', 'common' );
                                        break;
                                    case \CYH\ViewModels\RenderMode::LIST:
                                        foreach ($hero->HeroMsg as $feature) {
                                            ?>
                                            <ul class="text-left">
                                                <li>
                                                    <?php echo $feature ?>
                                                </li>
                                            </ul>
                                            <?php
                                        }
                                        break;
                                    case \CYH\ViewModels\RenderMode::STRING:
                                    default:
                                        echo $hero->HeroMsg;
                                }
                                ?>
                            </div>
                            <a href="tel:<?php echo $hero->Phone ?>"
                               onClick="<?php echo $hero->GaEventTrackingCode ?>"
                               class="phone-number btn btn-success btn-lg">
                                <i class="glyphicon glyphicon-earphone"></i>
                                <?php echo $hero->Phone ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>