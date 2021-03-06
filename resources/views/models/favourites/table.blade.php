<table class="table table-responsive" id="favourites-table">
    <thead>
        <th>Users Id</th>
        <th>Ads Id</th>
        <th colspan="3">Művelet</th>
    </thead>
    <tbody>
    @foreach($favourites as $favourites)
        <tr>
            <td>{!! $favourites->users_id !!}</td>
            <td>{!! $favourites->ads_id !!}</td>
            <td>
                {!! Form::open(['route' => ['favourites.destroy', $favourites->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('favourites.show', [$favourites->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('favourites.edit', [$favourites->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Biztos vagy benne?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
