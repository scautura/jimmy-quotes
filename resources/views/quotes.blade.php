<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <table>
            <tr>
                <td>Quote number</td>
                <td>Added By</td>
                <td>Author ID</td>
                <td>Author Name</td>
                <td>Quote</td>
            </tr>
            @foreach ($quotes as $quote)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $quote["added_by"] }}</td>
                <td>{{ $quote["author_id"] }}</td>
                <td>{{ $quote["author_name"] }}</td>
                <td>{{ $quote["text"] }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>