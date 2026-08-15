$(function(){


    // 下記に予約削除用のモーダルの表示も作成した
  $('.reserve-modal-btn').on('click', function(){

    
    $('.js-reserve-modal').fadeIn();
    // alert('テスト')

    var reserve_date = $(this).val();
    var reserve_part = $(this).data('part');
    var reserve_time = $(this).text();

    $('.reserve-date').text(reserve_date);
    $('.reserve-time').text(reserve_time);

    // CalendarView側の削除フォームに値をセット
        $('.reserve-date').val(reserve_date);
        $('.reserve-time').val(reserve_time);

    return false;
});

$('.js-reserve-modal-close').on('click', function(){
    $('.js-reserve-modal').fadeOut();

    return false;
});

// 「キャンセルする」ボタン
    $('.js-reserve-cancel').on('click', function(){

        $('#deleteParts').submit();

    });

});
