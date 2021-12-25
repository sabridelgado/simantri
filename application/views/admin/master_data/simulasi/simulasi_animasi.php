<?php $jumlahLoket =  $parameter[0]->p_loket  ?>

<style>
    .box {

        width: 300px;
        height: 221px;
        color: black;
        background: #fff;
        /* box-shadow: inset -3px -3px 6px #00FFE0, inset 3px 3px 6px #14E3CA; */
        border-radius: 22px;
        text-align: center;
        margin-top: 12%;
    }

    .box1 {

        width: auto;
        height: 70px;
        color: black;
        background: #fff;
        /* box-shadow: inset -3px -3px 6px #00FFE0, inset 3px 3px 6px #14E3CA; */

        text-align: center;
    }

    .box3 {

        width: 150px;
        height: 221px;
        color: black;
        background: #fff;
        /* box-shadow: inset -3px -3px 6px #00FFE0, inset 3px 3px 6px #14E3CA; */
        text-align: center;


        /* box-shadow: inset -3px -3px 6px #00FFE0, inset 3px 3px 6px #14E3CA; */

        text-align: center;
    }

    .shadow4 {
        background: linear-gradient(225.65deg, #31BDAC 0%, #64C8A9 50.99%, #92D1A7 98.9%);


    }


    .shadow3 {
        box-shadow: inset 3px 3px 6px rgba(0, 0, 0, 0.25);
    }

    .shadow2 {
        background: linear-gradient(225.65deg, #31BDAC 0%, #64C8A9 50.99%, #92D1A7 98.9%);

        border-radius: 5px 5px 0px 0px;
    }

    .queueWait {}

    #showTimer {
        color: black;
    }
</style>

<body class="">
    <div class="container-fluid">


        <div class="row  a">
            <div class="col-xl-2 col-md-2">
                <div class="box3    ">
                    <div class="py-3 shadow2 ">
                        <h3 style="color:#fff ; font-size: 20px;">Menunggu</h3>
                    </div>

                    <div>
                        <h2 style="color:black ; font-size: 60px;" class="queueWait p-4"></h2>
                    </div>
                </div>
            </div>

            <div class="  p-3 col-xl-7 col-md-7 mb-6  ">


            </div>
            <div class="box1  p-2 col-xl-3 col-md-3 mb-2 mt-0 shadow3">
                <h2 style="color:black ;" id="showTimer" class="mt-2 mb-5"></h2>
                <h6>0.1 : 1</h6>
            </div>





        </div>




        <div class=""></div>

        <br>

        <!-- <div class="col-md-4 col-lg-5 me-5">
        <div class="shadow1">
            <div class="py-3 shadow2 ">
                <h3 style="color:#FFF732 ;">Loket 1</h3>
            </div>
            <div class="p-4">
                <h1 style="font-size: 70px;">001</h1>
            </div>
        </div>
    </div> -->


        <div class="row  align-items-center mt-5">
            <?php for ($i = 1; $i <= $jumlahLoket; $i++) { ?>

                <div class="col-xl-2 col-md-2 mb-2">
                    <div class="">
                        <div class="row no-gutters align-items-center">
                            <div class="box ">
                                <div class="py-3 shadow2 ">
                                    <h3 style="color:#fff ; font-size: 20px;">Loket <?= $i ?></h3>

                                </div>
                                <div class="p-4">
                                    <h1 style="font-size: 60px;" class=" locket<?= $i ?>"></h1>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            <?php }; ?>

        </div>

    </div>
</body>


<script>
    const queueWait = document.querySelector('.queueWait');
    <?php for ($i = 1; $i <= $jumlahLoket; $i++) { ?>
        const locket<?= $i ?> = document.querySelector('.locket<?= $i ?>');
        let arrayLocket<?= $i ?> = [];
    <?php }; ?>


    // let arrayTimeIn = [{
    //         'nameOwner': 'Andi Yusuf',
    //         'timeIn': 5,
    //         'duration': 7, //= 12
    //     },
    //     {
    //         'nameOwner': 'Muh Alqadri',
    //         'timeIn': 6,
    //         'duration': 10, //= 16
    //     },
    //     {
    //         'nameOwner': 'Kevin Setiawan',
    //         'timeIn': 8,
    //         'duration': 2,
    //     }
    // ];

    let arrayTimeIn = [
        <?php foreach ($s_layan as $keys) { ?> {
                'nameOwner': '<?= $keys->id_pelayanan ?>',
                'timeIn': '<?= round($keys->wk_waktu) ?>',
                'duration': '<?= round($keys->w_layanan) ?>', //= 12
            },
        <?php }; ?>
    ];

    console.log(arrayTimeIn);

    let num = -1;
    let queue = [];
    let queueValue;
    setInterval(function() {

        num++;

        detik = num % 60;
        menit = Math.floor((num % 3600) / 60);
        jam = Math.floor((num % 86400) / 3600);


        $waktu = jam + ' : ' + menit + ' : ' + detik;
        document.querySelector('#showTimer').innerHTML = $waktu;

        // console.log(num);

        queueValue = arrayTimeIn.filter(e => e.timeIn == num);
        if (queueValue.length > 0) {
            queue.push(queueValue);

            changeQueueShow(queue[0][0].nameOwner);
        };

        if (queue.length > 0) {
            checkLocket(num);
        }

        checkLocketOut(num);

    }, 100);

    function checkLocket(num) {

        // console.log(queue);

        if (queue.length != 0) {
            <?php for ($i = 1; $i <= $jumlahLoket; $i++) {
                if ($i == 1) { ?>
                    if (arrayLocket<?= $i ?>.length == 0) {
                        arrayLocket<?= $i ?>.push(queue[0]);
                        arrayLocket<?= $i ?>[0][0].timeOut = parseInt(queue[0][0].duration) + num;

                        queue.splice(0, 1);
                        changeQueueShow('');
                        changeLocketShow(locket<?= $i ?>, arrayLocket<?= $i ?>[0][0].nameOwner)
                    }
                <?php } else { ?>
                    else if (arrayLocket<?= $i ?>.length == 0) {
                        arrayLocket<?= $i ?>.push(queue[0]);
                        arrayLocket<?= $i ?>[0][0].timeOut = parseInt(queue[0][0].duration) + num;

                        queue.splice(0, 1);
                        changeQueueShow('');
                        changeLocketShow(locket<?= $i ?>, arrayLocket<?= $i ?>[0][0].nameOwner)
                    }
                <?php }; ?>
            <?php }; ?>
        }

    }

    function checkLocketOut(num) {
        <?php for ($i = 1; $i <= $jumlahLoket; $i++) { ?>
            if (arrayLocket<?= $i ?>.length != 0 && arrayLocket<?= $i ?>[0][0].timeOut == num) {
                arrayLocket<?= $i ?>.splice(0, 1);
                changeLocketShow(locket<?= $i ?>, '')

                checkLocket(num);

            }
        <?php }; ?>
    }

    function changeQueueShow(show) {
        queueWait.innerHTML = show;
    }

    function changeLocketShow(locket, show) {
        locket.innerHTML = show;
    }
</script>