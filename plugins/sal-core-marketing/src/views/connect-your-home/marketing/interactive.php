<?php /**@var $calculationItem \CYH\Marketing\ViewModels\SpeedCalculatorItem*/?>
<!-- ko stopBinding: true -->
<section class="interactive-section" id="internetCityInteractivePage">
    <div class="container">
      <span class="active process-status loading" data-bind="css: {loading: Loading}"></span>
      <div class="row cyh-invisible" data-bind="css: {'cyh-invisible': Loading}">
            <h2>Calculate your speed</h2>
          <input type="number" data-bind="value: initDevices" min="1" max="10"/>
            <div class="wrapper">
                <div class="header">
                    <h1 class="heading">ConnectYourHome</h1>
                </div>
                <div class="content">
                    <div class="side-progressbar">

                        <div class="progressbar-items">
                            <div class="line" data-bind="css: {'active': pagingStep() == 1}"></div>
                            <div class="item people" data-bind="css: {'active': pagingStep() == 2}"></div>
                            <div class="item devices" data-bind="css: {'active': pagingStep() == 3}"></div>
                            <div class="item frequency" data-bind="css: {'active': pagingStep() == 4}"></div>
                            <div class="item final" data-bind="css: {'active': pagingStep() == 5}"></div>
                        </div>

                    </div>
                    <section class="section" data-bind="visible: pagingStep() == 1">
                        <div class="gauge-container">
                            <div class="gauge">
                                <div class="gauge-dots"></div>
                                <div class="gauge-line"></div>
                            </div>

                        </div>
                        <div class="recommendation">
                            <div class="recommendation-border">
                                <h3>We recommend at least</h3>
                                <h2><span data-bind="text: TotalSpeed"></span> Mbps</h2>
                            </div>
                        </div>
                    </section>
                    <section class="section" data-bind="visible: pagingStep() == 2">
                        test content 2
                    </section>
                    <section class="section" data-bind="visible: pagingStep() == 3">
                        test content 3
                    </section>
                    <section class="section" data-bind="visible: pagingStep() == 4">
                        test content 4
                    </section>
                    <section class="section" data-bind="visible: pagingStep() == 5">
                        test content 5
                    </section>
                </div>

                <div class="interactive-footer">
                    <h3 class="question-number" data-bind="visible: pagingStep() <= 4">Question <span data-bind="text: pagingStep" ></span>/4</h3>
                    <div class="progress-dot">1 2 3</div>
                    <div class="button-group">
                        <button data-bind="click: goPrev, visible: renderPrev">Prev</button>
                        <button data-bind="click: goNext, visible: renderNext">Next</button>
                        <button data-bind="click: goNext, visible: pagingStep() == 4">Results</button>
                        <button data-bind="click: goFirst, visible: pagingStep() == 5">Start Over</button>
                    </div>
                </div>
            </div>
        </div>
   </div>
</section>
<!-- /ko -->
<!--<div id="internetCityInteractivePage">
    <div id="content">
        <div id="icon-paging">
            <div data-bind="css: {'active': pagingStep() == 1}">
                <p>Init: <input type="number" data-bind="value: initDevices" min="1" max="10"/>
                <p>Calculated: <span data-bind="text: TotalSpeed" />
            </div>
            <div data-bind="css: {'active': pagingStep() == 2}"></div>
            <div data-bind="css: {'active': pagingStep() == 3}"></div>
            <div data-bind="css: {'active': pagingStep() == 4}"></div>
        </div>
        <div id="main-content">
            <div data-bind="visible: pagingStep() == 1">
                paging 1
            </div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div id="bottom-paging">
        <button data-bind="click: goPrev">Prev</button>
        <button data-bind="click: goNext">Next</button>
    </div>
</div>-->

<script>
    $(document).ready(function(){
        MarketingInteractive.Init('<?php echo base64_encode(json_encode($calculationItem))?>')
    });

</script>