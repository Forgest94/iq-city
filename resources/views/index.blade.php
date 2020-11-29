@extends('layouts.template')
@section('content')
    <h1>IQ городов</h1>
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
            </div>
            <div class="block-right">
                <div class="raiting-wrap" id="total">
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
        </div>
        @if(!empty($subIndexes))
            <div class="index_list">
                <h2>Субиндексы</h2>
                <div class="index_list-wrap">
                    @foreach($subIndexes as $subIndex)
                        @php($subIndexInfo = $subIndex->SubIndex[0])
                    <a class="raiting-wrap" href="{{ $subIndexInfo->slug }}" data-idsubindex="{{ $subIndex->id }}">
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
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix"
                                                 result="shape"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                                       values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                       result="hardAlpha"/>
                                        <feOffset dy="4"/>
                                        <feGaussianBlur stdDeviation="2"/>
                                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                        <feColorMatrix type="matrix"
                                                       values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.09 0"/>
                                        <feBlend mode="normal" in2="shape" result="effect1_innerShadow"/>
                                    </filter>
                                </defs>
                            </svg>

                            <div class="number">0</div>
                            <div class="orb"></div>
                        </div>
                        <h3>{{ $subIndexInfo->name }}</h3>
                    </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <script>
        window.citySubIndex = '<?=json_encode($subIndexesAll);?>';
    </script>
@endsection
