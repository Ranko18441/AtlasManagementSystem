$(function () {
    $('.user_search_conditions > p').click(function () {

        $('.user_search_conditions_inner').slideToggle();

        // 矢印の向きを切り替える
        $(this).find('.user_search_arrow').toggleClass('open');

    });
});