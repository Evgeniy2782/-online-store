<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrapLogin.css"/>
    <link rel="stylesheet" href="css/styleLogin.css"/>
    <link rel="stylesheet" href="css/myLogin.css"/>

    <br><br><br>
    <br><br><br>

    <title>АВТОРИЗАЦИЯ</title>
</head>
<body>

<div class="container">
    <div class="row">

        <div class="col-md-offset-3 col-md-6">
            <form class="form-horizontal" method="post" action="/auth">
                <span class="heading">АВТОРИЗАЦИЯ</span>
                <div class="form-group">
                    <input type="email" name = "login" class="form-control" id="inputEmail" placeholder="E-mail">
                    <i class="fa fa-user"></i>
                </div>
                <div class="form-group help">
                    <input type="password" name = "pass" class="form-control" id="inputPassword" placeholder="Password">
                    <i class="fa fa-lock"></i>
                    <a href="#" class="fa fa-question-circle"></a>
                </div>
                <div class="form-group">
                    <div class="main-checkbox">
                        <input type="checkbox" value="none" id="checkbox1" name="check"/>
                        <label for="checkbox1"></label>
                    </div>
                    <span class="text">Запомнить</span>
                    <ul class = "ulbtm">
                        <ul>
                            <button type="submit" class="btn btn-default">ВХОД</button>
                            <a type="button" class="btnReg btn-default" href="{{route('register')}}">регистрация</a>
                        </ul>
                    </ul>
                </div>
            </form>
        </div>

    </div><!-- /.row -->
</div><!-- /.container -->
</body>
</html>


