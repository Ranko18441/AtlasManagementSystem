<x-sidebar>
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="w-75 m-auto border" style="border-radius:5px;">

      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>

<div class="js-reserve-modal">
    <div class="js-reserve-modal__bg">
      <div class="js-reserve-modal__content">
    <h2>キャンセル確認</h2>
    <p>予約日：<span class="reserve-date"></span></p>
    <p>予約時間：</p>
    <button type="button" class="js-reserve-modal-close">閉じる</button>
    </div>
    </div>
  </div>

  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/calendar.js') }}" rel="stylesheet"></script>
  
</x-sidebar>
