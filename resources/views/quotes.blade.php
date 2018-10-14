<html>
    <head>
        <title>Jimmy Broadbent's Discord Quotes</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <table class="table">
            <thead>
                <tr>
                    <td>Quote number</td>
                    <td>Added By</td>
                    <td>Author ID</td>
                    <td>Author Name</td>
                    <td>Quote</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($quotes as $quote)<tr>
                    <th scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $quote["added_by"] }}</td>
                    <td>{{ $quote["author_id"] }}</td>
                    <td>{{ $quote["author_name"] }}</td>
                    <td>{{ $quote["text"] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('js/app.min.js') }}"></script>
    </body>
</html>