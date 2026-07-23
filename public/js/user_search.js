$(function () {
  $('.search_conditions').click(function () {
    $('.search_conditions_inner').slideToggle();

     let arrow = $(this).find('.arrow');

    if (arrow.text() == '▼') {
      arrow.text('▲');
    } else {
      arrow.text('▼');
    }

  });

  $('.subject_edit_btn').click(function () {
    $('.subject_inner').slideToggle();
    
  });
});
