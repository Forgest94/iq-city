@extends('layouts.template')
@section('content')
    <h1>{{ $subIndex->name }}</h1>
    <div class="wrapper">
        <div class="wrapper-block">
            <div class="block-left">
                <div class="select-block">
                    @if(!empty($cities))
                        <div class="select-box">
                            <span>Город</span>
                            <select name="city" id="city">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="select-box">
                        <span>Год</span>
                        <select name="year" id="year">
                            <option value="2019">2019</option>
                        </select>
                    </div>
                </div>
                <div class="raiting-wrap" data-idsubindex="{{ $subIndexesCity->id }}">
                    <div class="raiting-box">
                        <svg width="299" height="299" viewBox="0 0 299 299" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_i)">
                                <circle cx="149.5" cy="149.5" r="142.5" stroke="#EDEDED" stroke-opacity="0.7"
                                        stroke-width="13"/>
                                <circle class="circle-line" cx="149.5" cy="149.5" r="142.5" stroke="#13D7BC"
                                        stroke-opacity="0.7" stroke-width="13"/>
                            </g>
                            <defs>
                                <filter id="filter0_i" x="0.5" y="0.5" width="298" height="302"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                   values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                   result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="2"/>
                                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.09 0"/>
                                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow"/>
                                </filter>
                            </defs>
                        </svg>

                        <div class="number">0</div>
                        <div class="orb"></div>
                    </div>
                </div>
            </div>
            <div class="block-right">
                @if(!empty($indexes))
                    <div class="category">
                        <span class="category__title">Категория</span>
                        <div class="category-wrap">
                            @foreach($indexes as $index)
                                <div class="category-box">
                                    <div class="category-box__num">1</div>
                                    <div class="category-name">
                                        <p>{{ $index["name"] }}</p>
                                        <span>{{ $index["mark"]->mark }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="diagrams">
                        <svg width="456" height="136" viewBox="0 0 456 136" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3 128C2.44772 128 2 128.448 2 129C2 129.552 2.44772 130 3 130L108 130V135C108 135.552 108.448 136 109 136C109.552 136 110 135.552 110 135V130L222 130V135C222 135.552 222.448 136 223 136C223.552 136 224 135.552 224 135V130L335 130V135C335 135.552 335.448 136 336 136C336.552 136 337 135.552 337 135V130L455 130C455.552 130 456 129.552 456 129C456 128.448 455.552 128 455 128L3 128Z"
                                  fill="#F1F1F1"/>
                            <line x1="1" y1="128" x2="0.999994" y2="1" stroke="#F1F1F1" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="diagrams__title">Ед.</span>
                        <div class="diagrams-wrap">
                            <div class="diagrams-box">
                                <div class="diagrams-line">
                                    <span></span>
                                </div>
                                <div class="diagrams-year">2019</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal">
                <div class="modal-wrapper">
                    <span class="close-modal js-close-modal">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M14.962 16.3769C15.3524 16.7675 15.9856 16.7677 16.3762 16.3773C16.7669 15.987 16.7671 15.3538 16.3767 14.9631L9.75743 8.33953L16.3883 1.71955C16.7791 1.32934 16.7796 0.69618 16.3894 0.305335C15.9992 -0.0855087 15.3661 -0.086028 14.9752 0.304178L8.34369 6.92485L1.71632 0.293125C1.32593 -0.0975265 0.692764 -0.0977352 0.302111 0.29266C-0.0885423 0.683056 -0.0887505 1.31622 0.301646 1.70687L6.92831 8.3379L0.293473 14.9619C-0.0973714 15.3521 -0.09789 15.9853 0.292314 16.3761C0.682518 16.7669 1.31568 16.7675 1.70653 16.3773L8.34206 9.75258L14.962 16.3769Z"
                                  fill="#EDE5E5"/>
                        </svg>
                    </span>
                    <div class="modal-title">
                        <p>Барнаул</p>
                        <span>2019</span>
                    </div>
                    <span class="modal-subtitle">Службы доставки еды — агрегаторы</span>
                    <div class="modal-items">
                        <div class="modal-item">
                            <span>Яндекс.Еда</span>
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="9.5" cy="9.5" r="9.5" fill="#3AD14A"/>
                                <path d="M13 7L8.47059 12L6 9.27273" stroke="white" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="modal-item">
                            <span>Delivery Club</span>
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="9.5" cy="9.5" r="9.5" fill="#3AD14A"/>
                                <path d="M13 7L8.47059 12L6 9.27273" stroke="white" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.citySubIndex = '<?=json_encode($subIndexesAll);?>';
    </script>
@endsection
