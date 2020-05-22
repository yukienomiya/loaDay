<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>loadDay - Login Page</title>

    <link href="main.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper-full-page" style="background: lavender">
        <div class="full-page section-image" filter-color="black">
            <div class="content">
                <div class="container">
                    <div class="col-lg-4 col-md-6 col-sm-10 ml-auto mr-auto">

                        <?php
                            if(isset($_GET['message']))
                            {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET['message']?>
                        </div>
                        <?php } ?>

                        <?php
                            if(isset($_GET['message2']))
                            {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET['message2']?>
                        </div>
                        <?php } ?>

                        <form method="POST" action="../backend/login.php">
                             <div class="card">
                              <div class="card-header">
                                  <div class="section-image">
                                      <img src="img/logo.png" alt="logo">
                                  </div>
                              </div>
                              <div class="card-body ">
                                    <div class="input-group form-control-lg">
                                      <span class="input-group-prepend">
                                          <div class="input-group-text">
                                            <svg class="bi bi-person" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd"/>
                                              </svg>
                                          </div>
                                      </span>
                                      <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email" required="" autofocus="">
                                    </div>

                                    <div class="input-group form-control-lg">
                                      <div class="input-group-prepend">
                                          <div class="input-group-text">
                                            <svg class="bi bi-shield-lock" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 00-2.725.802.454.454 0 00-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 008 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 002.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 00-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 012.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 01-2.418 2.3 6.942 6.942 0 01-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 01-1.007-.586 11.192 11.192 0 01-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 012.415 1.84a61.11 61.11 0 012.772-.815z" clip-rule="evenodd"/>
                                                <path d="M9.5 6.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                                                <path d="M7.411 8.034a.5.5 0 01.493-.417h.156a.5.5 0 01.492.414l.347 2a.5.5 0 01-.493.585h-.835a.5.5 0 01-.493-.582l.333-2z"/>
                                              </svg>
                                          </div>
                                      </div>
                                      <input id="pass" type="password" class="form-control" name="pass" required="" placeholder="Password">
                                    </div>
                              </div>
                              <div class="card-footer ">
                                   <button type="submit" name="login" class="btn btn-primary btn-lg btn-block mb-3">
                                          Login
                                      </button>
                                  
                                  <div class="text-center">
                                      <small><a href="registrazione.html" class="link footer-link">Non sei registrato? Clicca qui!</a></small>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>

</div>
</div>
</body>
</html>
