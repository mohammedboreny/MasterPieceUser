@extends('layout.index')
@section('content')

<div class="container mt-3 pt-3">
    @If(\Session::has('status')) 
<div style="background-color: #ff7241" class="alert text-light text-center mt-3"> {!! Session::get('status') !!}</div>
@endif
<div class="table-responsive-md "style="height:40vh ;">
    <table class="table table-secondary">
        <thead>
            <tr>
                <th scope="col">Column 1</th>
                <th scope="col">Column 2</th>
                <th scope="col">Column 3</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td scope="row">R1C1</td>
                <td>R1C2</td>
                <td>R1C3</td>
            </tr>
            <tr class="">
                <td scope="row">Item</td>
                <td>Item</td>
                <td>Item</td>
            </tr>
        </tbody>
    </table>
</div>
</div>


@endsection