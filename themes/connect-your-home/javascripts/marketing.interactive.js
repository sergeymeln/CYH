var MarketingInteractive = MarketingInteractive || {};

(function () {
    var self = this;

    self.settings = {}
    self.Init = function(data){
        console.log(data);
        data = atob(data);
        self.vm = self.GetVm();
        self.vm.Initialize(data);
        ko.bindingHandlers.stopBinding = {
            init: function() {
                return { controlsDescendantBindings: true };
            }
        };

        ko.virtualElements.allowedBindings.stopBinding = true;
        ko.applyBindings(self.vm, document.getElementById("internetCityInteractivePage"));
        self.vm.Loading(false);
    }

    self.GetVm = function () {
        return new InternetCityInteractiveVm();
    };

    function InternetCityInteractiveVm() {
        var inner = this;

        inner.Loading = ko.observable(true);
        inner.pagingStep = ko.observable(1);
        inner.renderPrev = ko.observable(false);
        inner.renderNext = ko.observable(true);
        inner.initDevices = ko.observable(1);
        inner.TotalSpeed = ko.observable(true);
        inner.goNext = function()
        {
            inner.pagingStep(inner.pagingStep() + 1);
            if (inner.pagingStep() < 4) {
                inner.renderPrev(true);
            }
            if(inner.pagingStep() >= 4) {
                inner.renderPrev(false);
                inner.renderNext(false);
            }

        };

        inner.goPrev = function()
        {
            if (inner.pagingStep() > 1 && inner.pagingStep() <= 4) {
                inner.pagingStep(inner.pagingStep() - 1);
                inner.renderNext(true);
            }
            if (inner.pagingStep() == 1) {
                inner.renderPrev(false);
            }
        };

        inner.goFirst = function()
        {
            inner.pagingStep(1);
            inner.renderNext(true);
            inner.initDevices(1);
        };

        inner.Initialize = function (data) {
            ko.mapping.fromJSON(data, {}, inner);
            InitCustomComputeds();
        };

        function InitCustomComputeds() {

            inner.TotalSpeed = ko.computed(function(){
                var res = 0;
                var totalDevices=0;
                totalDevices+=parseInt(inner.initDevices());

                switch (totalDevices) {
                    case 1:
                        res = inner.DevicesUsage.basic.speed()[Math.floor(inner.DevicesUsage.basic.speed().length/2)];
                        break;
                    case 2:
                        res = inner.DevicesUsage.medium.speed()[Math.floor(inner.DevicesUsage.medium.speed().length/2)-1];
                        break;
                    case 3:
                        res = inner.DevicesUsage.medium.speed()[Math.floor(inner.DevicesUsage.medium.speed().length/2)+2];
                        break;
                    case 4:
                        res = inner.DevicesUsage.advanced.speed()[Math.floor(Math.random()*inner.DevicesUsage.advanced.speed().length)];
                        break;
                    default:
                        res = 26;
                        break;

                }
                return res;
            })

        }
    }

}).apply(MarketingInteractive);
