<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Livewire Image Upload Tutorial - Tutsmake.com</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }


        .customer-preview-image-bg {
            background-color: #eeeeee;
            /* Light Green */
            border-radius: 6px;
            /* 0.375rem */
            width: 100%;
            height: 240px;
            /* 15rem */
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px
        }

        .customer-preview-image {
            border-radius: 6px;
            /* 0.375rem */
            height: 198px;
            width: 198px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row mt-5 justify-content-center">
            <div class="mt-5 col-md-8">
                <div class="card">
                    <div class="card-header bg-success">
                        <h2 class="text-white">Laravel 10 Livewire Image Upload Example</h2>
                    </div>
                    <div class="card-body">
                        @livewire('image-upload')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>
