document.addEventListener('DOMContentLoaded', function (event) {
  $('button.provider-name').on('click', function () {
    $(this).parents('td').first().find('.instructions-gwp').show()
  });
  $('.instructions-gwp span').on('click', function () {
    $(this).parent().hide();
  });

  $('.providers-table  span.disclaimer').on('click', function () {
    $(this).parents('tr').next().toggle();

    return false;
  });

});