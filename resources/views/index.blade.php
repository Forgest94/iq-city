<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Умный город</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/style.css">

    </head>
    <body>
        <div class="container">
            <h1>Экономическое состояние и инвестиционный климат</h1>
            <div class="wrapper">
                <div class="block-left">
                    <div class="select-block">
                        <div class="select-box">
                            <span>Город</span>
                            <select name="city" id="city">
                                <option value="1">Барнаул</option>
                                <option value="2">Новосибирск</option>
                                <option value="3">Уфа</option>
                            </select>
                        </div>
                        <div class="select-box">
                            <span>Год</span>
                            <select name="year" id="year">
                                <option value="1">2020</option>
                                <option value="2">2019</option>
                                <option value="3">2018</option>
                            </select>
                        </div>
                    </div>
                    <div class="raiting-wrap">
                        <div class="raiting-box">
                            <svg width="299" height="299" viewBox="0 0 299 299" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_i)">
                                    <circle cx="149.5" cy="149.5" r="142.5" stroke="#EDEDED" stroke-opacity="0.7" stroke-width="13"/>
                                    <circle class="circle-line" cx="149.5" cy="149.5" r="142.5" stroke="#13D7BC" stroke-opacity="0.7" stroke-width="13"/>
                                </g>
                                <defs>
                                    <filter id="filter0_i" x="0.5" y="0.5" width="298" height="302" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                        <feOffset dy="4"/>
                                        <feGaussianBlur stdDeviation="2"/>
                                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.09 0"/>
                                        <feBlend mode="normal" in2="shape" result="effect1_innerShadow"/>
                                    </filter>
                                </defs>
                            </svg>

                            <div class="number">5</div>
                            <div class="orb"></div>
                        </div>
                    </div>
                </div>
                <div class="block-right"></div>
            </div>
        </div>
    </body>

    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/jquery.selectric.js"></script>
    <script src="/js/script.js"></script>

</html>
