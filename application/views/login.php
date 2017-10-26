<style>
body {
        background-color: #444;
        background: url(http://www.cafeitalia.com.au/Content/images/background/private-dining.jpg);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        
    }
    .form-signin input[type="text"] {
        margin-bottom: 5px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .form-signin .form-control {
        position: relative;
        font-size: 16px;
        font-family: 'Open Sans', Arial, Helvetica, sans-serif;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .vertical-offset-100 {
        padding-top: 100px;
    }
    .img-responsive {
    display: block;
    max-width: 100%;
    height: auto;
    margin: auto;
    }
    .panel {
    margin-bottom: 20px;
    background-color: rgba(255, 255, 255, 0.75);
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }
</style>
 <!-- Bootstrap Core CSS -->
 <link href="<?= base_url() ?>/assets/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
        <body>
            <div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="http://s11.postimg.org/7kzgji28v/logo_sm_2_mr_1.png" class="img-responsive" alt="Conxole Admin"/>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="Login/process_login" action="Login/process_login" class="form-signin" >
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result">
                                            <?php if(isset($error_message['invalid_user'])) { ?>
                                                <div class="alert"><?= $error_message['invalid_user']; ?></div>
                                            <?php } ?>
                                            <?php if(isset($error_message['username'])) { ?>
                                                <div class="alert"><?= $error_message['username']; ?></div>
                                            <?php } ?>
                                            <?php if(isset($error_message['password'])) { ?>
                                                <div class="alert"><?= $error_message['password']; ?></div>
                                            <?php } ?>
                                            </div>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Username " id="UserName" name="username">
                                        <input type="password" class="form-control" placeholder="Password" id="Passwod" name="password">
                                        <br></br>
                                        <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login »">
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
<script>
$(document).ready(function() {
    $(document).mousemove(function(event) {
        TweenLite.to($("body"), 
        .5, {
            css: {
                backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px",
            	"background-position": parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / 12) + "px, " + parseInt(event.pageX / 15) + "px " + parseInt(event.pageY / 15) + "px, " + parseInt(event.pageX / 30) + "px " + parseInt(event.pageY / 30) + "px"
            }
        })
    })
})
</script>