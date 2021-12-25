<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url() ?>upload/setting/<?php echo $settings_app[0]->setting_logo ?>">
    <title><?php echo $settings_app[0]->setting_appname ?></title>
    <!-- CSS Here -->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/login.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">


    <style type="text/css">
        body,
        html {
            margin: 0;
            padding: 0;
        }

        .fontPoppins {
            font-family: 'Poppins', sans-serif;
        }

        .body-1 {
            padding-top: 20%;
            padding-right: calc(2rem + 40px);
            padding-left: calc(2rem + 40px);
            /* padding-bottom:19%; */
            margin: 0;
            background-image: linear-gradient(90deg, rgba(40, 186, 171, 0.4738270308123249) 27%, rgba(142, 218, 179, 0.4738270308123249) 100%, rgba(0, 0, 0, 1) 100%), url("https://source.unsplash.com/pT4gB7T6tog/");
            background-size: cover;
            background-color: #4d4d4d;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
            object-fit: cover
        }

        .body-2 {
            background: linear-gradient(180deg, #28BAAB 0%, #8EDAB3 100%);
            margin: 0;
            padding: 70px 80px 0 80px;
            min-height: 100vh;
            overflow: hidden;
        }

        .center-this {
            /* padding: 20px; */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .title-1 {
            margin-bottom: 20px;
            padding: 0 80px 0 80px;
            font-weight: bold;
            font-size: 20px;
            line-height: 132%;
            color: white;
            /* font-weight:600; */
            letter-spacing: 1px;
        }

        .col-md-12 {
            padding: 0;
            margin: 0;
        }

        .col-md-6 {
            /* padding:0; */
            margin: 0;
        }

        .log-text {
            color: #FFFFFF;
            font-size: 32px;
            font-weight: 700;
            /* margin-top:calc(20vh + 20px) */
        }

        .log-text-title {
            margin-top: 20px;
            color: #FFFFFF;
            font-size: 14px;
            /* font-weight:700; */
        }

        span {
            color: #fff;
        }

        .alert {
            height: 150px;
        }

        .input-log {
            margin: 10px 0 20px 0;
            padding: 24px;
            border: 1px solid #FFFFFF;
            box-sizing: border-box;
            border-radius: 11px;
            background: transparent;
        }

        .input-log::-webkit-input-placeholder {
            color: white;

        }

        .btn-login {
            /* margin:10px 0 20px 0; */
            margin: 30px 0 30px 0;
            background: linear-gradient(270deg, #FDA047 0%, #FAC177 100%);
            padding: 14px;
            color: #FFFFFF;
            font-size: 18px;
            box-shadow: 0px 6px 40px rgba(253, 160, 71, 0.42);
            border-radius: 20px;
            transition: box-shadow ease 0.5s;
            -o-transition: background ease 0.5s;


            /* Opera */
        }

        .btn-login:hover {
            transition: all 0.5s;
            color: #FFFFFF;
            box-shadow: inset -6px -6px 12px #FAC177, inset 6px 6px 12px #FDA047;
        }

        .row {
            margin: 0
        }

        .blob1 {
            position: absolute;
            top: 0%;
            right: 0%;
        }

        .blob2 {
            position: absolute;
            top: 90%;
            right: 90%;
        }

        .blob3 {
            position: absolute;
            top: 90%;
            right: -4%;
        }

        .blob4 {
            position: absolute;
            top: 45%;
            right: 45%;
        }

        .blob5 {
            position: absolute;
            top: 10%;
            right: 80%;
        }

        .blob6 {
            position: absolute;
            top: 10%;
            right: 40%;
        }
    </style>
</head>

<body class="fontPoppins">
    <div class="col-md-12">
        <div class="rowresponsive row">



            <div class="col-md-5 body-2">


                <svg class="blob6" width="129" height="129" viewBox="0 0 129 129" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="11.0408" y="80.9291" width="13.7929" height="111" rx="6.89645" transform="rotate(-100 11.0408 80.9291)" fill="url(#paint0_linear_72:60)" />
                    <rect x="48.0708" y="11.0407" width="13.7929" height="111" rx="6.89645" transform="rotate(-10 48.0708 11.0407)" fill="url(#paint1_linear_72:60)" />
                    <defs>
                        <linearGradient id="paint0_linear_72:60" x1="17.9372" y1="80.9291" x2="17.9372" y2="191.929" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#38BFAD" />
                            <stop offset="1" stop-color="#70D1B1" />
                        </linearGradient>
                        <linearGradient id="paint1_linear_72:60" x1="54.9672" y1="11.0407" x2="54.9672" y2="122.041" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#38BFAD" />
                            <stop offset="1" stop-color="#70D1B1" />
                        </linearGradient>
                    </defs>
                </svg>

                <svg class="blob5" width="75" height="75" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="31.0346" cy="31.0346" r="26.0394" transform="rotate(120 31.0346 31.0346)" stroke="url(#paint0_linear_72:52)" stroke-width="8" />
                    <defs>
                        <linearGradient id="paint0_linear_72:52" x1="31.0346" y1="0.995199" x2="31.0346" y2="61.074" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#8EDAB3" />
                            <stop offset="1" stop-color="#28BAAB" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>

                <svg class="blob4" width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="31.0346" cy="31.0346" r="26.0394" transform="rotate(120 31.0346 31.0346)" stroke="url(#paint0_linear_72:52)" stroke-width="8" />
                    <defs>
                        <linearGradient id="paint0_linear_72:52" x1="31.0346" y1="0.995199" x2="31.0346" y2="61.074" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#8EDAB3" />
                            <stop offset="1" stop-color="#28BAAB" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>

                <svg class="blob4" width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="31.0346" cy="31.0346" r="26.0394" transform="rotate(120 31.0346 31.0346)" stroke="url(#paint0_linear_72:52)" stroke-width="8" />
                    <defs>
                        <linearGradient id="paint0_linear_72:52" x1="31.0346" y1="0.995199" x2="31.0346" y2="61.074" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#8EDAB3" />
                            <stop offset="1" stop-color="#28BAAB" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>


                <svg class="blob3" width="96" height="87" viewBox="0 0 96 87" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="5" y="5" width="40" height="47" stroke="url(#paint0_linear_72:56)" stroke-width="7" />
                    <defs>
                        <linearGradient id="paint0_linear_72:56" x1="48" y1="0" x2="48" y2="87" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#8EDAB3" />
                            <stop offset="1" stop-color="#28BAAB" />
                        </linearGradient>
                    </defs>
                </svg>

                <svg class="blob1" width="100" height="124" viewBox="0 0 138 124" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M79.2274 10.9064L131.392 101.279C135.939 109.157 130.255 119 121.165 119L16.8349 119C7.74541 119 2.06054 109.157 6.60753 101.279L58.7727 10.9064C63.3184 3.03121 74.6817 3.03121 79.2274 10.9064Z" stroke="url(#paint0_linear_66:40)" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_66:40" x1="69" y1="-16.8135" x2="68.9999" y2="170.938" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#28BAAB" />
                            <stop offset="1" stop-color="#8EDAB3" />
                        </linearGradient>
                    </defs>
                </svg>
                <svg class="blob2" width="60" height="60" viewBox="0 0 86 93" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.89523 38.5684L78.5954 5.84112C79.2973 5.52512 80.0781 6.08751 80.0008 6.85341L71.9934 86.1772C71.9161 86.9431 71.0386 87.3381 70.414 86.8882L5.72128 40.2917C5.09663 39.8418 5.19329 38.8844 5.89523 38.5684Z" stroke="url(#paint0_linear_66:47)" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_66:47" x1="-5.6336" y1="38.275" x2="109.84" y2="49.9317" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#28BAAB" />
                            <stop offset="1" stop-color="#8EDAB3" />
                        </linearGradient>
                    </defs>
                </svg>



                <div class="alert">
                    <?php echo form_open("home/login", "class='user'");
                    if ($this->session->flashdata('login')) {
                        echo "<div class='alert alert-danger alert-dismissible'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <h4><i class='icon fa fa-ban'></i> Oopss!</h4>" . $this->session->flashdata('login') . "</div>";
                    }
                    ?>
                </div>
                <h4 class="log-text">Sign-In</h4>
                <p class="log-text-title">Hai, Silahkan Masukkan Username dan Password untuk Masuk</p>
                <br>
                <span>Username</span>
                <input type="text" class="form-control input-log" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username" name="username">

                <span>Password</span>
                <br>
                <input type="password" class="form-control input-log" id="exampleInputPassword" placeholder="Masukkan Password" name="password">
                <button class="btn btn-login btn-block">Log In</button>
                <?php echo form_close(); ?>
            </div>
            <div class="col-md-7 body-1">
                <div class="center-this">
                    <img src="<?php echo base_url() ?>upload/setting/<?php echo $settings_app[0]->setting_logo ?>" height="50">&nbsp;&<br>
                </div><br>
                <h3 class="title-1 center-this"><?php echo $settings_app[0]->setting_appname ?>
                    </h2>
                    <h4 class="text-white center-this" style="font-size:20px">Teknik Informatika <br><?php echo $settings_app[0]->setting_origin_app; ?></h4>
            </div>
        </div>
    </div>

    <!-- JavaScript Here -->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
</body>

</html>