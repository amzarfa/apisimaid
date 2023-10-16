<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">

    <title>SIMA ID</title>
    <meta name="description" content="Sistem Informasi Manajemen APIP Indonesia - Powered by Pusinfowas BPKP">
    <meta name="keywords" content="SIMHPNAS BPKP">
    <meta name="author" content="amzarfa x gugunmdr">
    <link rel="icon" type="image/png" href="{{ asset('/img/simhp/icon-logo.svg') }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="SIMA ID">
    <meta itemprop="description" content="Sistem Informasi Manajemen APIP Indonesia - Powered by Pusinfowas BPKP">
    <meta itemprop="image" content="{{ asset('/img/simhp/fb-debugger.png') }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="">/
    <meta property="og:type" content="website">
    <meta property="og:title" content="SIMA ID">
    <meta property="og:description" content="Sistem Informasi Manajemen APIP Indonesia - Powered by Pusinfowas BPKP">
    <meta property="og:image" content="{{ asset('/img/simhp/fb-debugger.png') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SIMA ID">
    <meta name="twitter:description" content="Sistem Informasi Manajemen APIP Indonesia - Powered by Pusinfowas BPKP">
    <meta name="twitter:image" content="{{ asset('/img/simhp/fb-debugger.png') }}">

    <script>
        window.Laravel = {
            !!json_encode([
                'csrfToken' => csrf_token(),
            ]) !!
        };
    </script>

    <style>
        html {
            background-color: #000121;
            font-family: 'Roboto', sans-serif;

        }

        .maincontainer {
            position: relative;
            top: -50px;
            transform: scale(0.8);
            background: url("{{ asset('/img/HauntedHouseBackground.png') }}");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 700px 600px;
            width: 800px;
            height: 600px;
            margin: 0px auto;
            display: grid;
        }

        .foregroundimg {
            position: relative;
            width: 100%;
            top: -230px;
            z-index: 5;
        }

        .errorcode {
            position: relative;
            top: -200px;
            font-family: 'Creepster', cursive;
            color: white;
            text-align: center;
            font-size: 6em;
            letter-spacing: 0.1em;
        }

        .errortext {
            position: relative;
            top: -260px;
            color: #FBD130;
            text-align: center;
            text-transform: uppercase;
            font-size: 1.8em;
        }

        .bat {
            opacity: 0;
            position: relative;
            transform-origin: center;
            z-index: 3;
        }

        .bat:nth-child(1) {
            top: 380px;
            left: 120px;
            transform: scale(0.5);
            animation: 13s 1s flyBat1 infinite linear;
        }

        .bat:nth-child(2) {
            top: 280px;
            left: 80px;
            transform: scale(0.3);
            animation: 8s 4s flyBat2 infinite linear;
        }

        .bat:nth-child(3) {
            top: 200px;
            left: 150px;
            transform: scale(0.4);
            animation: 12s 2s flyBat3 infinite linear;
        }

        .body {
            position: relative;
            width: 50px;
            top: 12px;
        }

        .wing {
            width: 150px;
            position: relative;
            transform-origin: right center;
        }

        .leftwing {
            left: 30px;
            animation: 0.8s flapLeft infinite ease-in-out;
        }

        .rightwing {
            left: -180px;
            transform: scaleX(-1);
            animation: 0.8s flapRight infinite ease-in-out;
        }

        @keyframes flapLeft {
            0% {
                transform: rotateZ(0);
            }

            50% {
                transform: rotateZ(10deg) rotateY(40deg);
            }

            100% {
                transform: rotateZ(0);
            }
        }

        @keyframes flapRight {
            0% {
                transform: scaleX(-1) rotateZ(0);
            }

            50% {
                transform: scaleX(-1) rotateZ(10deg) rotateY(40deg);
            }

            100% {
                transform: scaleX(-1) rotateZ(0);
            }
        }

        @keyframes flyBat1 {
            0% {
                opacity: 1;
                transform: scale(0.5)
            }

            25% {
                opacity: 1;
                transform: scale(0.5) translate(-400px, -330px)
            }

            50% {
                opacity: 1;
                transform: scale(0.5) translate(400px, -800px)
            }

            75% {
                opacity: 1;
                transform: scale(0.5) translate(600px, 100px)
            }

            100% {
                opacity: 1;
                transform: scale(0.5) translate(100px, 300px)
            }
        }

        @keyframes flyBat2 {
            0% {
                opacity: 1;
                transform: scale(0.3)
            }

            25% {
                opacity: 1;
                transform: scale(0.3) translate(200px, -330px)
            }

            50% {
                opacity: 1;
                transform: scale(0.3) translate(-300px, -800px)
            }

            75% {
                opacity: 1;
                transform: scale(0.3) translate(-400px, 100px)
            }

            100% {
                opacity: 1;
                transform: scale(0.3) translate(100px, 300px)
            }
        }

        @keyframes flyBat3 {
            0% {
                opacity: 1;
                transform: scale(0.4)
            }

            25% {
                opacity: 1;
                transform: scale(0.4) translate(-350px, -330px)
            }

            50% {
                opacity: 1;
                transform: scale(0.4) translate(400px, -800px)
            }

            75% {
                opacity: 1;
                transform: scale(0.4) translate(-600px, 100px)
            }

            100% {
                opacity: 1;
                transform: scale(0.4) translate(100px, 300px)
            }
        }
    </style>

</head>
