<h2>User List</h2>
<table border="1">
    <thead>
        <tr>
            <th>Belt</th>
            <th>Name</th>
            <th>Tests Assigned</th>
            <th>Assign a Test</th>
        </tr>
    </thead>
    @foreach ($users as $user)
    
    <tr>
        <td><img src="/images/{{$user->belt->picture}}.png"></td>
        <td>{{$user->name}}</td>
        <td>{{$user->assignedTests->count()}}</td>
        <td>
        <form method="POST" action="AssignTest">
            {{ csrf_field() }}
            <select name="selected_test" id="selected_test">
            <?php $tests = $user->availableTests()->get(); ?>

                @foreach ($tests as $test)
                    <option value="{{$test->id}}">{{$test->name}}</option>
                @endforeach
            </select><input type="hidden" name="user_id" value="{{$user->id}}"><button class="btn btn-primary" type="submit">Assign Test</button></form></td>
    </tr>
    
    @endforeach
</table>