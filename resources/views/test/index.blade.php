<html>
    <head></head>
    <body>
    @if (count($tests) > 0)
        <table>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>DESC</td>
            </tr>
            @foreach ($tests as $test)
            <tr>
                <td>{!! $test->id !!}</td>
                <td>{!! $test->name !!}</td>
                <td>{!! $test->description !!}</td>
            </tr>
            @endforeach
        </table>
    @endif
    </body>
</html>
