<x-sidebar>
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-50 m-auto h-75">
    <p><span>日</span><span class="ml-3">部</span></p>
    <div class="h-75 border">
      <table class="">
        @foreach($reservePersons as $reservePerson)
        <tr class="text-center">
          <th class="w-25">ID</th>
        <td>
        @foreach($reservePerson->users as $user)
        {{ $user->id }}
        @endforeach
         </td>
        </tr>
        @endforeach
        

        @foreach($reservePersons as $reservePerson)
        <tr class="text-center">
        <th class="w-25">名前</th>
        <td>
          @foreach($reservePerson->users as $user)
          {{ $user->over_name }} {{ $user->under_name }}
          @endforeach
        </td>
      </tr>
      @endforeach
        <tr class="text-center">
          <td class="w-25">場所</td>
          <td class="w-25">リモート</td>
        </tr>
      </table>
    </div>
  </div>
</div>
</x-sidebar>
