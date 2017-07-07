<h2>User List</h2>
<?php
    $id = Auth::id();
    $users = App\User::studentsOf($id)->orderBy('belt_id')->get();
?>
<table border="1">
    @foreach ($users as $user)
    <tr>
        <td><img src="/images/{{$user->belt->picture}}.png"></td>
        <td>{{$user->name}}</td>
    </tr>
    @endforeach
</table>
