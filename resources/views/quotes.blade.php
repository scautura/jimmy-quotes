<html>
    <head>
        <title>{{ $guild->name }} Quotes</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <td>Quote number</td>
                        <td>Added By</td>
                        <td>Author</td>
                        <td>Quote</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quotes as $quote)<tr>
                        <th scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $quote["added_by"] }}</td>
                        <td>@if (intval($quote["author_id"])==0){{ $quote["author_name"] }}@else{{ $users->where('id', intval($quote["author_id"]))->first()->name }}@endif</td>
                        <td>{!! nl2br($quote["text"]) !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('js/app.min.js') }}"></script>
    </body>
</html>