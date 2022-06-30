<div class="login-form py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-sm">
                    <span class="shape"></span>
                    <div class="card-header text-center bg-transparent">
                        
                    </div>
                    <div class="card-body py-4">
                        <form  method="POST" action="/login">
                            <div class="form-group">
                                <label for="name">Login</label>
                                <input type="text" name="login" class="form-control shadow-none" placeholder="Login" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="name">Senha</label>
                                <input type="password" name="password" class="form-control shadow-none" placeholder="Senha"  required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember_me" >
                                    <label class="custom-control-label" for="customCheck1">Lembrar</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>