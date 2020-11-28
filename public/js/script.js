/*let max = 6000,
    used = 4200,
    percentUsed = Math.round(used / max * 100),
    degreesRotate = Math.round( 3.6 * percentUsed),
    CounterInterval = 1500 / percentUsed,
    percentDisplayed = 0,
    numberObject = document.querySelector('.number'),
    circle = document.querySelector('.circle-line'),
    circleLength = circle.getTotalLength(),
    circleDashLength = circleLength - (circleLength / 285 * percentUsed);

setTimeout(function(){
    document.querySelector('.orb').style.transform = 'rotate(' + degreesRotate + 'deg)';
    circle.setAttribute('style', 'stroke-dashoffset:' + circleDashLength + ';');

    var counter = setInterval(function(){

        numberObject.innerHTML = percentDisplayed;

        percentDisplayed += 1;

        if(percentDisplayed == percentUsed + 1) {
            clearInterval(counter);
        }
    }, CounterInterval);
}, 200);*/
