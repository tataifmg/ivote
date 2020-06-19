@extends('decisor.basedecisor')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <form class="container" action="/action_page.php">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control"  id="nome">
                </div>
                <div class="form-group">
                    <label for="cpf">Cpf:</label>
                    <input type="text" class="form-control"  id="cpf">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control"  id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Senha:</label>
                    <input type="password" class="form-control"  id="pwd">
                </div>
                <div class="form-group">
                    <label for="entidade">Entidade:</label>
                    <select name="cars" class="custom-select">
                        <option selected>Custom Select Menu</option>
                        <option value="volvo">Volvo</option>
                        <option value="fiat">Fiat</option>
                        <option value="audi">Audi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="custom-select">
                        <option selected>Custom Select Menu</option>
                        <option value="volvo">Volvo</option>
                        <option value="fiat">Fiat</option>
                        <option value="audi">Audi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <select name="cars" class="custom-select">
                        <option selected>Custom Select Menu</option>
                        <option value="volvo">Volvo</option>
                        <option value="fiat">Fiat</option>
                        <option value="audi">Audi</option>
                    </select>
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection