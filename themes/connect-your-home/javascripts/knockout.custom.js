ko.bindingHandlers.slick = {
    init: function (element, valueAccessor, allBindings, viewModel, bindingContext) {
        var value = ko.utils.unwrapObservable(valueAccessor())
        $(element).slick(value.slickOptions);

        if (value.targetObservable) {
            viewModel[value.targetObservable + 'Internet'].subscribe(function () {
                if ($(element).hasClass('slick-initialized')) {
                    $(element).slick('unslick');
                }
                $(element).slick(value.slickOptions);
                viewModel[value.targetObservable + 'Loading'](false);
                // viewModel['AllProductsLoading'](false);
            });
        }

        if (value.orderNumberHandler) {
            $(element).on('afterChange', function (slick, currentSlide) {
                viewModel[value.orderNumberHandler](currentSlide.currentSlide + 1);
            });
        }
    }
}