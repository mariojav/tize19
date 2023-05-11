@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Ups!</strong> Hubo problemas con el ingreso de datos:
            <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
    </div>
@endif
        