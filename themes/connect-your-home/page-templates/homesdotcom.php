<?php
/**
 * Template Name: Homesdotcom
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */
?>

<?php get_header('homesdotcom'); ?>
    <section class="hero">
        <div class="row">
            <div class="col-md-12">
                <div class="masthead">
                    <?php $hero_image = get_field('homepage_hero'); ?>
                    <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>" />
                    <div class="masthead-widget">
                        <p>
                            Find Home Services. Find Deals. Right Here.
                        </p>
                        <form style="color: black"  onsubmit="return false;">
                                    <input class="testing input address-100%complete" type="form-control" name="search" id="homeSearch" placeholder="Enter address" >
                                <button class="btn btn-orange search-button">Go!</button>                             
                            <!-- <input class="btn btn-orange" type="submit"> -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </section>


    <section class="services">
        <div class="row">
            <div class="col-md-12">
                <div class="ticker">
                    <?php the_field('homepage_marquee'); ?>
                </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
    <!-- <div id="hello">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 centered">
                    <div id="nt-title-container">
                        <ul id="nt-title">
                            <li>
                                A powerful, flexible and animated vertical news ticker plugin.
                            </li>
                            <li>
                                Provides hight flexibility thanks to numerous callbacks & methods.
                            </li>
                            <li>
                                Fully customizable to every kind of vertical scrolling need.
                            </li>
                            <li>
                                Light-weight and optimized JQuery plugin.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 
    </div> -->
        
        <div class="row service-head">
            <div class="col-md-8 col-md-offset-2">
                <h1>
                    <?php the_field('homepage_heading'); ?>
                </h1>
                <p>
                    <?php the_field('homepage_heading_strapline'); ?>
                </p>
            </div>
            <!-- /.col-md-8 col-md-offset-2 -->
        </div>
            <div class="row">
            <div class="col-md-3 col-sm-6 icon-holder">
                <!-- <span class="glyphicon glyphicon-phone-alt"></span> -->

<svg version="1.1" class="enlivenem" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100px" viewBox="67.476 14.847 160.997 210.552" enable-background="new 67.476 14.847 160.997 210.552" xml:space="preserve" data-global-elvn="enableViewport, enableClick, none, startInvisible, notResponsive, 0, noLoop, 6000">
<g display="none" xmlns="http://www.w3.org/2000/svg">
    <g display="inline">
        <path fill="#4167B1" d="M262.258,180.773c-2.191,0-3.964,1.761-3.964,3.965c0,2.191,1.771,3.96,3.964,3.96
            c2.189,0,3.967-1.769,3.967-3.96C266.225,182.534,264.447,180.773,262.258,180.773z"></path>
        <path fill="#4167B1" d="M278.584,180.773c-2.195,0-3.963,1.761-3.963,3.965c0,2.191,1.768,3.96,3.963,3.96
            c2.186,0,3.955-1.769,3.955-3.96C282.539,182.534,280.77,180.773,278.584,180.773z"></path>
        <path fill="#4167B1" d="M288.454,12.893H14.407c-2.26,0-4.085,1.826-4.085,4.081V195.07c0,2.257,1.826,4.086,4.085,4.086H148.54
            v22.586H51.027c-1.555,0-2.813,1.257-2.813,2.818c0,1.557,1.258,2.812,2.813,2.812h208.85c1.549,0,2.814-1.257,2.814-2.812
            c0-1.562-1.267-2.818-2.814-2.818H154.184v-22.586h134.271c2.26,0,4.085-1.829,4.085-4.086V16.974
            C292.539,14.719,290.714,12.893,288.454,12.893z M262.258,188.698c-2.191,0-3.964-1.769-3.964-3.96
            c0-2.204,1.771-3.965,3.964-3.965c2.189,0,3.967,1.761,3.967,3.965C266.225,186.93,264.447,188.698,262.258,188.698z
             M278.584,188.698c-2.195,0-3.963-1.769-3.963-3.96c0-2.204,1.768-3.965,3.963-3.965c2.186,0,3.955,1.761,3.955,3.965
            C282.539,186.93,280.77,188.698,278.584,188.698z M286.078,173.129H16.782V19.72h269.296V173.129z"></path>
    </g>
</g>
<g display="none" xmlns="http://www.w3.org/2000/svg">
    <g display="inline">
        <path fill="#4167B1" d="M152.637,158.814c-9,0-16.293,7.174-16.293,16.024c0,8.845,7.292,16.006,16.292,16.006
            c8.989,0,16.294-7.161,16.294-16.006C168.93,165.988,161.625,158.814,152.637,158.814z"></path>
        <path fill="#4167B1" d="M152.21,13.882C95.405,13.882,43,42.456,12.044,90.313c-2.932,4.531-1.633,10.585,2.9,13.514
            c4.526,2.933,10.584,1.639,13.516-2.893c27.344-42.267,73.603-67.501,123.75-67.501c50.267,0,96.569,25.304,123.86,67.693
            c1.863,2.902,5.016,4.49,8.229,4.49c1.812-0.005,3.644-0.509,5.28-1.562c4.533-2.919,5.846-8.967,2.919-13.51
            C261.605,42.541,209.154,13.882,152.21,13.882z"></path>
        <path fill="#4167B1" d="M152.21,56.608c-42.971,0-82.216,21.915-104.958,58.632c-2.845,4.587-1.431,10.614,3.166,13.454
            c4.588,2.845,10.615,1.432,13.455-3.161c19.155-30.917,52.179-49.379,88.337-49.379c36.295,0,69.363,18.513,88.444,49.519
            c1.85,2.996,5.056,4.65,8.336,4.65c1.746,0,3.519-0.472,5.109-1.452c4.602-2.833,6.033-8.85,3.207-13.445
            C234.643,78.596,195.346,56.608,152.21,56.608z"></path>
        <path fill="#4167B1" d="M152.21,100.817c-28.389,0-54.761,15.413-68.809,40.235c-2.666,4.699-1.016,10.66,3.683,13.321
            c4.696,2.652,10.657,1.004,13.32-3.688c10.593-18.705,30.44-30.327,51.805-30.327c21.432,0,41.311,11.651,51.889,30.405
            c1.793,3.188,5.105,4.977,8.521,4.977c1.623,0,3.272-0.403,4.792-1.262c4.699-2.649,6.361-8.617,3.712-13.315
            C207.082,116.276,180.678,100.817,152.21,100.817z"></path>
    </g>
</g>
<g>
    <g>
        <path fill="#6CB33F" d="M192.93,132.52c54.922-66.94,33.979-103.599,17.522-111.794l-0.478,1.143L186.104,78.52l-0.261,0.639
            c0.281,0.093,0.57,0.18,0.843,0.275c2.332,0.82,3.832,3.54,3.469,5.533c-1.098,5.736-4.836,16.037-16.855,31.075l-0.039,0.036
            c-12.475,14.977-21.884,20.66-27.255,22.814c-1.787,0.726-4.42,0.349-5.377-1.386c-0.256-0.501-0.523-0.995-0.811-1.485
            l-52.768,35.136C98.311,185.896,137.996,199.48,192.93,132.52z"></path>
        <path fill="#6CB33F" d="M173.159,74.181c0,0,1.289,0.53,2.747,1.123l24.697-58.624c-1.598-0.671-3.135-1.281-3.135-1.281
            c-3.658-1.524-7.857,0.214-9.367,3.892l-18.836,45.492C167.741,68.455,169.494,72.671,173.159,74.181z" data-elvn="fade, in, 0, 600, linear" class="elvn-layer"></path>
        <path fill="#6CB33F" d="M81.015,162.157l52.958-35.249c-0.976-1.434-1.898-2.812-1.898-2.812c-2.218-3.282-6.679-4.148-9.982-1.92
            l-40.811,27.537c-3.295,2.23-4.147,6.701-1.931,9.993C79.351,159.705,80.133,160.854,81.015,162.157z" data-elvn="fade, in, 0, 600, linear" class="elvn-layer"></path>
        <path fill="#6CB33F" d="M195.115,197.165c-1.319-1.319-3.459-1.319-4.781,0l-22.471,22.459c-1.322,1.321-1.322,3.458,0,4.78
            c0.662,0.662,1.531,0.994,2.396,0.994c0.871,0,1.729-0.332,2.391-0.994l22.465-22.454
            C196.441,200.627,196.441,198.488,195.115,197.165z" data-elvn="fadeShortL, in, 0, 700, linear" class="elvn-layer"></path>
        <path fill="#6CB33F" d="M133.659,197.165c-1.322-1.319-3.453-1.319-4.775,0l-22.463,22.459c-1.321,1.321-1.321,3.458,0,4.78
            c0.662,0.662,1.522,0.994,2.393,0.994c0.864,0,1.724-0.332,2.388-0.994l22.457-22.454
            C134.986,200.627,134.986,198.488,133.659,197.165z" data-elvn="fadeShortL, in, 0, 600, linear" class="elvn-layer"></path>
        <path fill="#6CB33F" d="M174.635,197.165c-1.322-1.319-3.463-1.319-4.781,0l-22.46,22.459c-1.312,1.321-1.312,3.458,0,4.78
            c0.662,0.662,1.526,0.994,2.398,0.994c0.857,0,1.727-0.332,2.385-0.994l22.459-22.454
            C175.953,200.627,175.953,198.488,174.635,197.165z" data-elvn="fadeShortL, in, 0, 800, linear" class="elvn-layer"></path>
        <path fill="#6CB33F" d="M154.148,197.165c-1.32-1.319-3.467-1.319-4.787,0L126.9,219.624c-1.313,1.321-1.313,3.458,0,4.78
            c0.661,0.662,1.525,0.994,2.398,0.994c0.863,0,1.733-0.332,2.395-0.994l22.458-22.454
            C155.469,200.627,155.469,198.488,154.148,197.165z" data-elvn="fadeShortL, in, 0, 800, linear" class="elvn-layer"></path>
        <path fill="#6CB33F" d="M210.818,197.165l-22.452,22.459c-1.313,1.321-1.313,3.458,0,4.78c0.663,0.662,1.526,0.994,2.394,0.994
            c0.871,0,1.731-0.332,2.391-0.994l22.455-22.454c1.322-1.323,1.322-3.462,0-4.785
            C214.284,195.846,212.145,195.846,210.818,197.165z" data-elvn="fadeShortL, in, 0, 800, linear" class="elvn-layer"></path>
        <path fill="#6CB33F" d="M111.952,197.161c-1.32-1.313-3.467-1.317-4.79,0.011l-16.543,16.581c-3.645,3.631-9.951,3.617-13.568,0
            c-1.804-1.815-2.81-4.217-2.81-6.767c0-2.562,1.005-4.967,2.73-6.704l9.306-8.73c1.365-1.274,1.426-3.418,0.147-4.774
            c-1.279-1.356-3.412-1.435-4.775-0.153l-9.386,8.801c-3.082,3.082-4.787,7.19-4.787,11.562c0,4.351,1.705,8.462,4.787,11.549
            c3.095,3.093,7.206,4.797,11.579,4.797c4.342,0,8.457-1.704,11.554-4.8l16.562-16.587
            C113.273,200.624,113.273,198.482,111.952,197.161z" data-elvn="pulse, in, 300, 800, linear" class="elvn-layer"></path>
    </g>
</g>
</svg>
                <h2>Phone</h2>
                                <p>
                                    <?php the_field('phone_copy'); ?> 
                                    <br/> 
                                </p>
             
            </div>
            <div class="col-md-3 col-sm-6 icon-holder">
                <!-- <span class="glyphicon glyphicon-blackboard"></span> -->

<svg version="1.1" id="Layer_1" class="enlivenem" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100px" viewBox="10.322 12.893 282.218 214.48" enable-background="new 10.322 12.893 282.218 214.48" xml:space="preserve" data-global-elvn="enableViewport, enableClick, none, startInvisible, notResponsive, 0, noLoop, 5000">

<g>
    <g>
        <path fill="#FF872B" d="M262.258,180.773c-2.191,0-3.964,1.761-3.964,3.965c0,2.191,1.771,3.96,3.964,3.96
            c2.189,0,3.967-1.769,3.967-3.96C266.225,182.534,264.447,180.773,262.258,180.773z" data-elvn="pulse, in, 0, 750, linear" class="elvn-layer"></path>
        <path fill="#FFD82B" d="M278.584,180.773c-2.195,0-3.963,1.761-3.963,3.965c0,2.191,1.768,3.96,3.963,3.96
            c2.186,0,3.955-1.769,3.955-3.96C282.539,182.534,280.77,180.773,278.584,180.773z" data-elvn="pulse, in, 500, 750, linear" class="elvn-layer"></path>
        <path fill="#6CB33F" d="M288.454,12.893H14.407c-2.26,0-4.085,1.826-4.085,4.081V195.07c0,2.257,1.826,4.086,4.085,4.086H148.54
            v22.586H51.027c-1.555,0-2.813,1.257-2.813,2.818c0,1.557,1.258,2.812,2.813,2.812h208.85c1.549,0,2.814-1.257,2.814-2.812
            c0-1.562-1.267-2.818-2.814-2.818H154.184v-22.586h134.271c2.26,0,4.085-1.829,4.085-4.086V16.974
            C292.539,14.719,290.714,12.893,288.454,12.893z M262.258,188.698c-2.191,0-3.964-1.769-3.964-3.96
            c0-2.204,1.771-3.965,3.964-3.965c2.189,0,3.967,1.761,3.967,3.965C266.225,186.93,264.447,188.698,262.258,188.698z
             M278.584,188.698c-2.195,0-3.963-1.769-3.963-3.96c0-2.204,1.768-3.965,3.963-3.965c2.186,0,3.955,1.761,3.955,3.965
            C282.539,186.93,280.77,188.698,278.584,188.698z M286.078,173.129H16.782V19.72h269.296V173.129z"></path>
    </g>
</g>

</svg>
                <h2>Television</h2>
                                <p class="serviceParagraph">
                                    <?php the_field('television_copy'); ?>
                                    <br/> 
                                </p>

            </div>
            <div class="col-md-3 col-sm-6 icon-holder">
                <!-- <span class="glyphicon  glyphicon-globe"></span> -->

<svg version="1.1" class="enlivenem" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="283.583px" height="100px" viewBox="10.476 13.882 283.583 176.963" enable-background="new 10.476 13.882 283.583 176.963" xml:space="preserve" data-global-elvn="enableViewport, enableClick, none, startInvisible, notResponsive, 0, noLoop, 6000">
<g display="none" xmlns="http://www.w3.org/2000/svg">
    <g display="inline">
        <path fill="#4167B1" d="M262.258,180.773c-2.191,0-3.964,1.761-3.964,3.965c0,2.191,1.771,3.96,3.964,3.96
            c2.189,0,3.967-1.769,3.967-3.96C266.225,182.534,264.447,180.773,262.258,180.773z"></path>
        <path fill="#4167B1" d="M278.584,180.773c-2.195,0-3.963,1.761-3.963,3.965c0,2.191,1.768,3.96,3.963,3.96
            c2.186,0,3.955-1.769,3.955-3.96C282.539,182.534,280.77,180.773,278.584,180.773z"></path>
        <path fill="#4167B1" d="M288.454,12.893H14.407c-2.26,0-4.085,1.826-4.085,4.081V195.07c0,2.257,1.826,4.086,4.085,4.086H148.54
            v22.586H51.027c-1.555,0-2.813,1.257-2.813,2.818c0,1.557,1.258,2.812,2.813,2.812h208.85c1.549,0,2.814-1.257,2.814-2.812
            c0-1.562-1.267-2.818-2.814-2.818H154.184v-22.586h134.271c2.26,0,4.085-1.829,4.085-4.086V16.974
            C292.539,14.719,290.714,12.893,288.454,12.893z M262.258,188.698c-2.191,0-3.964-1.769-3.964-3.96
            c0-2.204,1.771-3.965,3.964-3.965c2.189,0,3.967,1.761,3.967,3.965C266.225,186.93,264.447,188.698,262.258,188.698z
             M278.584,188.698c-2.195,0-3.963-1.769-3.963-3.96c0-2.204,1.768-3.965,3.963-3.965c2.186,0,3.955,1.761,3.955,3.965
            C282.539,186.93,280.77,188.698,278.584,188.698z M286.078,173.129H16.782V19.72h269.296V173.129z"></path>
    </g>
</g>
<g>
    <g>
        <path fill="#6CB33F" d="M152.637,158.814c-9,0-16.293,7.174-16.293,16.024c0,8.845,7.292,16.006,16.292,16.006
            c8.989,0,16.294-7.161,16.294-16.006C168.93,165.988,161.625,158.814,152.637,158.814z" data-elvn="pulse, in, 0, 900, easeinout" class="elvn-layer"></path>
        <path fill="#6CB33F" d="M152.21,13.882C95.405,13.882,43,42.456,12.044,90.313c-2.932,4.531-1.633,10.585,2.9,13.514
            c4.526,2.933,10.584,1.639,13.516-2.893c27.344-42.267,73.603-67.501,123.75-67.501c50.267,0,96.569,25.304,123.86,67.693
            c1.863,2.902,5.016,4.49,8.229,4.49c1.812-0.005,3.644-0.509,5.28-1.562c4.533-2.919,5.846-8.967,2.919-13.51
            C261.605,42.541,209.154,13.882,152.21,13.882z" data-elvn="fadeShortB, in, 1050, 900, easeinout" class="elvn-layer"></path>
        <path fill="#6CB33F" d="M152.21,56.608c-42.971,0-82.216,21.915-104.958,58.632c-2.845,4.587-1.431,10.614,3.166,13.454
            c4.588,2.845,10.615,1.432,13.455-3.161c19.155-30.917,52.179-49.379,88.337-49.379c36.295,0,69.363,18.513,88.444,49.519
            c1.85,2.996,5.056,4.65,8.336,4.65c1.746,0,3.519-0.472,5.109-1.452c4.602-2.833,6.033-8.85,3.207-13.445
            C234.643,78.596,195.346,56.608,152.21,56.608z" data-elvn="fadeShortB, in, 900, 900, easeinout" class="elvn-layer"></path>
        <path fill="#6CB33F" d="M152.21,100.817c-28.389,0-54.761,15.413-68.809,40.235c-2.666,4.699-1.016,10.66,3.683,13.321
            c4.696,2.652,10.657,1.004,13.32-3.688c10.593-18.705,30.44-30.327,51.805-30.327c21.432,0,41.311,11.651,51.889,30.405
            c1.793,3.188,5.105,4.977,8.521,4.977c1.623,0,3.272-0.403,4.792-1.262c4.699-2.649,6.361-8.617,3.712-13.315
            C207.082,116.276,180.678,100.817,152.21,100.817z" data-elvn="fadeShortB, in, 700, 900, easeinout" class="elvn-layer"></path>
    </g>
</g>
</svg>               
                <h2>Internet</h2>
                                <p>
                                    <?php the_field('internet_copy'); ?>  
                                </p>

            </div>  
            <div class="col-md-3 col-sm-6 icon-holder">


<svg version="1.1" class="enlivenem" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="133.545px" height="100px" viewBox="0 0 133.545 210.553" enable-background="new 0 0 133.545 210.553" xml:space="preserve" data-global-elvn="enableViewport, enableClick, none, startInvisible, notResponsive, 0, noLoop, 7000">
<g id="Layer_2" xmlns="http://www.w3.org/2000/svg">
    <rect x="31.696" y="113.966" fill="#6CB33F" width="81.233" height="67.42"></rect>
    <polygon fill="#6CB33F" points="66.862,51.017 0,97.796 0,210.553 133.545,210.553 133.545,97.796     "></polygon>
    <polygon fill="#6CB33F" points="66.862,51.017 0,97.796 0,210.553 133.545,210.553 133.545,97.796     "></polygon>
    <rect x="85.017" y="122.83" fill="#FFFFFF" width="13.98" height="49.692" data-elvn="expandY, in, 0, 550, bounce" class="elvn-layer"></rect>
    <rect x="35.319" y="122.83" fill="#FFFFFF" width="13.986" height="49.692" data-elvn="expandY, in, 250, 550, bounce" class="elvn-layer"></rect>
    <g>
        <rect x="35.319" y="122.83" fill="none" width="13.986" height="49.692"></rect>
        <path fill="none" d="M96.634,71.9V44.139c0-14.959-12.173-27.129-27.114-27.129h-5.771c-14.967,0-27.133,12.17-27.133,27.129
            v28.042l30.246-21.164L96.634,71.9z"></path>
        <rect x="85.017" y="122.83" fill="none" width="13.98" height="49.692"></rect>
    </g>
    <g>
        <path fill="none" d="M69.52,17.01h-5.771c-14.967,0-27.133,12.17-27.133,27.129v28.042l30.246-21.164L96.634,71.9V44.139
            C96.634,29.18,84.461,17.01,69.52,17.01z"></path>
        <rect x="35.319" y="122.83" fill="none" width="13.986" height="49.692"></rect>
        <rect x="85.017" y="122.83" fill="none" width="13.98" height="49.692"></rect>
        <path fill="#6CB33F" d="M36.616,44.139c0-14.959,12.166-27.129,27.133-27.129h5.771c14.941,0,27.114,12.17,27.114,27.129V71.9
            l17.007,11.931V44.139C113.641,19.796,93.853,0,69.52,0h-5.771C39.406,0,19.604,19.796,19.604,44.139V84.08l17.012-11.899V44.139z
            " data-elvn="morph, in, 600, 1050, easein" class="elvn-layer"></path>
        <path fill="#6CB33F" d="M113.641,83.831L96.634,71.9L66.862,51.017L36.616,72.181L19.604,84.08L0,97.796v112.757h133.545V97.796
            L113.641,83.831z M49.306,172.521H35.319V122.83h13.986V172.521z M98.997,172.521h-13.98V122.83h13.98V172.521z"></path>
    </g>
</g>
<g id="Layer_1" display="none" xmlns="http://www.w3.org/2000/svg">
</g>
</svg>            
                <h2>Security</h2>
                                <p>
                                    <?php the_field('home_security_copy'); ?> 
                                    <br/> </span> 
                                </p>
                                        

            </div>  
        </div>
    </section>
        <hr/>
    
<section class="all-brand-grid">

<?php
    // counter to open and close rows
    $i = 1;
    echo ' <div class="row no-gutter"><div class="row-height">';

     if(get_field('brand_details')): ?>
   
    

    <?php while(has_sub_field('brand_details')): ?>

      <div class="col-sm-4 brand-module col-sm-height">
          <div class="inside inside-full-height text-center">
            <?php $brandlogo = get_sub_field('brand_logo'); ?>
              <img class="img-natural" src="<?php echo $brandlogo['url']; ?>" alt="<?php echo $brandlogo['alt'] ?>">
              <h3><?php the_sub_field('brand_title'); ?></h3>
              <p><?php the_sub_field('brand_copy'); ?></p>
              <a href="tel:<?php the_sub_field('view_details'); ?>" class="brands-btn btn btn-success btn-lg" style="color: #fff;"  onClick="ga('send', 'event', 'Call', 'ClicktoCall - Homes.COM lander');"><i class="glyphicon glyphicon-earphone"></i>  <?php echo the_sub_field('view_details'); ?></a>
          </div>
      </div>

         <?php  // After every three entries close and open a row
          if($i % 3 == 0) {echo '</div></div><div class="row no-gutter"><div class="row-height">';} ?>

         

    <?php 
     $i++;
    endwhile; ?>



<?php endif;
echo ' </div></div>';

 ?>

</section>

    <hr/>
   <section class="how-it-works">
        <div class="row">
            <div class="col-md-12">
                <div class="mast">
                    <h2>
                        <?php the_field('homepage_video_heading'); ?>
                    </h2>
                    <p>
                        <?php the_field('homepage_video_heading_copy'); ?>

                    </p>
                </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
<!--             <div class="col-md-8">
                <div class="map">
                    <iframe width="100%" height="512" src="" data-src="https://www.youtube.com/embed/2k52EryKFxY?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div> -->
            <!-- /.col-md-8 -->
            <div class="col-md-12">
                <ol class="step-list">
                    <div class="col-md-4 text-center">
                        <h2 class="steps-digits">1:</h2>
                        <h4 class="steps-head">
                            <?php the_field('homepage_step_1'); ?>
                        </h4>
                        <p>
                            <?php the_field('homepage_step_1_content'); ?>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                    
                        <h2 class="steps-digits">2:</h2>
                        <h4 class="steps-head">
                            <?php the_field('homepage_step_2'); ?>
                        </h4>
                        <p>
                            <?php the_field('homepage_step_2_content'); ?>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                    
                        <h2 class="steps-digits">3:</h2>
                        <h4 class="steps-head">
                            <?php the_field('homepage_step_3'); ?>
                        </h4>
                        <p>
                            <?php the_field('homepage_step_3_content'); ?>
                        </p>
                    </div>
                </ol>
            </div>
            
        </div>
       
    </section>

<section class="homesdotcom-email-list">
    

    <script type="text/javascript" src="https://cyh.formstack.com/forms/js.php/homesdotcom"></script><noscript><a href="https://cyh.formstack.com/forms/homesdotcom" title="Online Form">Online Form - HomesDotCom</a></noscript>


</section>

 <a  style="display: none;"  href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Homes Email');" id="homesEmail" class="phone-number btn btn-success btn-block btn-lg"><i class="glyphicon glyphicon-earphone"></i> <?php echo get_field('home_phone_number', 'option');?></a>



<!-- /.one-brand -->

<?php include 'modal-form.php' ?>
<div class="col-md-12">
    <?php get_footer('home'); ?>
</div>
<!--     <script src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery.newsTicker.min.js" type="text/javascript"></script> -->




<script type="text/javascript">
   
    function findGetParameter(parameterName) {
        var result = null,
            tmp = [];
        location.search
        .substr(1)
            .split("&")
            .forEach(function (item) {
            tmp = item.split("=");
            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
        return result;
    }

    var param1 = findGetParameter("phoneNumber")

    function submit()
    {   
        var phoneNumber = document.getElementById("homesEmail");
        phoneNumber.href = "tel:" + param1
        if(param1 != null){
            phoneNumber.click();
        }
    }
</script>