<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating Konsumen</title>

    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Open Sans", Helvetica, Arial, sans-serif;
            color: #555;
            max-width: 680px;
            margin: 0 auto;
            padding: 0 20px;
        }

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .clearfix {
            clear: both;
        }

        .text-center {
            text-align: center;
        }

        a {
            color: tomato;
            text-decoration: none;
        }

        a:hover {
            color: #2196f3;
        }

        pre {
            display: block;
            padding: 9.5px;
            margin: 0 0 10px;
            font-size: 13px;
            line-height: 1.42857143;
            color: #333;
            word-break: break-all;
            word-wrap: break-word;
            background-color: #F5F5F5;
            border: 1px solid #CCC;
            border-radius: 4px;
        }

        .header {
            padding: 20px 0;
            position: relative;
            margin-bottom: 10px;

        }

        .header:after {
            content: "";
            display: block;
            height: 1px;
            background: #eee;
            position: absolute;
            left: 30%;
            right: 30%;
        }

        .header h2 {
            font-size: 3em;
            font-weight: 300;
            margin-bottom: 0.2em;
        }

        .header p {
            font-size: 14px;
        }

        #a-footer {
            margin: 20px 0;
        }

        .new-react-version {
            padding: 20px 20px;
            border: 1px solid #eee;
            border-radius: 20px;
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.1);

            text-align: center;
            font-size: 14px;
            line-height: 1.7;
        }

        .new-react-version .react-svg-logo {
            text-align: center;
            max-width: 60px;
            margin: 20px auto;
            margin-top: 0;
        }

        .success-box {
            margin: 50px 0;
            padding: 10px 10px;
            border: 1px solid #eee;
            background: #f9f9f9;
        }

        .success-box img {
            margin-right: 10px;
            display: inline-block;
            vertical-align: top;
        }

        .success-box>div {
            vertical-align: top;
            display: inline-block;
            color: #888;
        }

        /* Rating Star Widgets Style */
        .rating-stars ul {
            list-style-type: none;
            padding: 0;

            -moz-user-select: none;
            -webkit-user-select: none;
        }

        .rating-stars ul>li.star {
            display: inline-block;

        }

        /* Idle State of the stars */
        .rating-stars ul>li.star>i.fa {
            font-size: 2.5em;
            /* Change the size of the stars */
            color: #ccc;
            /* Color on idle state */
        }

        /* Hover state of the stars */
        .rating-stars ul>li.star.hover>i.fa {
            color: #FFCC36;
        }

        /* Selected state of the stars */
        .rating-stars ul>li.star.selected>i.fa {
            color: #FF912C;
        }
    </style>

</head>

<body id="page-top" class="text-align">

    <header class='header text-center'>
        <h2>Penilaian Konsumen</h2>
        <p>Silahkan Berikan Penilaian Anda</p>
    </header>

    <section class='rating-widget'>

        <!-- Rating Stars Box -->
        <div class='rating-stars text-center'>
            <ul id='stars'>
                <li class='star' title='Poor' data-value='1'>
                    <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Fair' data-value='2'>
                    <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Good' data-value='3'>
                    <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Excellent' data-value='4'>
                    <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='WOW!!!' data-value='5'>
                    <i class='fa fa-star fa-fw'></i>
                </li>
            </ul>
        </div>
        <form method="POST" action="<?= base_url('rating/update'); ?>">
            <div class='success-box'>
                <textarea class="form-control" placeholder="Keterangan" row="3" id="ket" name="ket"></textarea>
                <br>
                <input type="hidden" name="rate" id="rate">
                <input type="hidden" name="token" id="token" value="<?= $token; ?>">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>



    </section>



    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function() {
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e) {
                    if (e < onStar) {
                        $(this).addClass('hover');
                    } else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function() {
                $(this).parent().children('li.star').each(function(e) {
                    $(this).removeClass('hover');
                });
            });


            /* 2. Action to perform on click */
            $('#stars li').on('click', function() {
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                rate(ratingValue);
            });

            function rate(ratingValue) {
                document.getElementById('rate').value = ratingValue;
            }


        });
    </script>

</body>

</html>