<x-sidebar>
<div class="vh-100 d-flex" style="justify-content:center;">
  
    <div class="w-75 h-75 m-auto">
    <p class="reserve_date">
    <span>{{ \Carbon\Carbon::parse($date)->format('Y年m月d日') }}</span>
    <span class="ml-3">{{ $part }}部</span>
</p>
    <div class="reserve_list">
      <table class="reserve_table">
        <thead>
        <tr class="text-center">
          <th class="w-25">ID</th>
          <th class="w-25">名前</th>
          <th class="w-25">場所</th>
        </tr>
        </thead>

        @foreach($reservePersons as $reservePerson)
        @foreach($reservePerson->users as $user)
        <tr class="text-center">
          <td>{{ $user->id }}</td>
          <td>{{ $user->over_name }} {{ $user->under_name }}</td>
          <td>リモート</td>
        </tr>
        @endforeach
      @endforeach
      </table>
    </div>
  </div>
</div>
</x-sidebar>
