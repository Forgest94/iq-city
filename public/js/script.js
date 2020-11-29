$( document ).ready( function() {
    
    //Инициализация селектрика
    $('select').selectric();

    //Анимация кружка
    let maxPercent = 12,
        numberObject = document.querySelectorAll('.number'),
        circle = document.querySelectorAll('.circle-line'),
        orb =  document.querySelectorAll('.orb');

    function animationCircle() {
        for ( let i = 0; i < circle.length; i++ ) {
            let usedPercent = parseInt($(circle[i]).closest('.raiting-wrap').find('.number').text()),
                percentUsed = Math.round(usedPercent / maxPercent * 100),
                degreesRotate = Math.round(3.6 * percentUsed),
                CounterInterval = 1500 / percentUsed,
                circleDash = circle[i].getTotalLength(),
                circleDashLength = circleDash - (circleDash / 100 * percentUsed),
                percentDisplayed = 0;

            setTimeout(function () {

                orb[i].style.transform = 'rotate(' + degreesRotate + 'deg)';
                circle[i].setAttribute('style', 'stroke-dashoffset:' + circleDashLength + ';');

                const counter = setInterval(function () {
                    numberObject[i].innerHTML = Math.round(percentDisplayed * maxPercent / 100);
                    percentDisplayed += 1;

                    if (percentDisplayed == percentUsed + 1) {
                        clearInterval(counter);
                    }
                }, CounterInterval);
            }, 200);
        }
    };

    $('[name="city"]').on('change', function(event, element, selectric) {

        changeCity($(this).find(':selected').val());

    });

    function changeCity(id) {
        let marks = JSON.parse(window.citySubIndex),
            total = 0;
        for ( let i in marks ) {
            if ( marks[i].id_city == id ) {
                if ( document.querySelector('[data-idsubindex="'+ marks[i].id_subindex +'"]') != null ) document.querySelector('[data-idsubindex="'+ marks[i].id_subindex +'"]').querySelector('.number').innerHTML = marks[i].mark;
                total += marks[i].mark;
            }
        }

        if ( document.querySelector('#total .number') != null ) document.querySelector('#total .number').innerHTML = parseInt(total);
        animationCircle();
    }
    changeCity(1);


    //Модалка категорий
    let openModal = document.querySelectorAll('.category-box'),
        closeModal = document.querySelector('.js-close-modal'),
        modal = document.querySelector('.modal');

    openModal.forEach(function(item) {
        item.addEventListener('click', () => {
            modal.classList.add('modal-open')
        })
    });

    if (closeModal != null) {
        closeModal.addEventListener('click', () => {
            modal.classList.remove('modal-open')
        });
    }


});




