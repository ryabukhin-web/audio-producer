let closeMenu;

closeMenu = document.createElement('div');
closeMenu.className = 'nav__close icon-close action-menu';
document.querySelector('.nav__list').prepend(closeMenu);

closeMenu = document.createElement('div');
closeMenu.className = 'nav__back action-menu';
document.querySelector('.header__nav').prepend(closeMenu);

openModal('action-menu', 'header__nav');
openModal('js-search', 'search-modal');

function openModal(actionClass, modalClass) {
    let modal = document.querySelector('.' + modalClass);
    let action = document.querySelectorAll('.' + actionClass);

    action.forEach((el, i) => {
        el.addEventListener('click', (e) => {
            if (modal.classList.contains(modalClass + '_open')) {
                modal.classList.remove(modalClass + '_open');
            } else {
                modal.classList.add(modalClass + '_open');
            }
        });
    });
}

if (document.querySelector('.js-d-slider')) {
    const swiperTopSlider = new Swiper('.js-d-slider', {
        slidesPerView: 2,
        spaceBetween: 50,
        autoHeight: false,
        infinite: true,
        watchOverflow: true,
        loop: true,
        autoplay: {
            delay: 6000,
        },
        navigation: {
            nextEl: '.d-slider__arrow_next',
            prevEl: '.d-slider__arrow_prev'
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            851: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            950: {
                slidesPerView: 2,
                spaceBetween: 50,
            },
        }
    });
}

jQuery(function ($) {
    $('img.img-svg').each(function () {
        var $img = $(this);
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');
        $.get(imgURL, function (data) {
            var $svg = $(data).find('svg');
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass + ' replaced-svg');
            }
            $svg = $svg.removeAttr('xmlns:a');
            if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }
            $img.replaceWith($svg);
        }, 'xml');
    });

    // AJAX загрузка страниц/записей WP 
    $('.js-loadmore').on('click', function () {
        let _this = $(this);
        _this.html('<span class="icon-load _rotate"></span>Загрузка...');

        let data = {
            'action': 'loadmore',
            'query': _this.attr('data-param-posts'),
            'page': this_page,
            'tpl': _this.attr('data-tpl'),
            'search': _this.attr('data-search')
        }

        console.log(_this.attr('data-param-posts'));

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            type: 'POST',
            success: function (data) {
                if (data) {
                    let str = `<style>`;
                    for (let i = 1; i <= _this.attr('data-posts-per-page'); i++) {
                        str += `._show:nth-child(` + (i + (this_page * _this.attr('data-posts-per-page'))) + `){ -webkit-animation: _show-1 ` + (i * 0.3) + `s ease-in-out,_show-2 0.9s ease-in-out ` + (i * 0.3) + `s,_show-3 0.9s ease-in-out ` + (i * 0.3 + 0.9) + `s infinite; animation: _show-1 ` + (i * 0.3) + `s ease-in-out,_show-2 0.9s ease-in-out ` + (i * 0.3) + `s,_show-3 0.9s ease-in-out ` + (i * 0.3 + 0.9) + `s infinite; }`;
                    }
                    str += `</style>`;
                    _this.parent().prev().prev().before(str);
                    _this.html('<span class="icon-load"></span>Показать еще');
                    _this.parent().prev().prev().append(data).show(1000);
                    this_page++;
                    if (this_page == _this.attr('data-max-pages')) {
                        _this.remove();
                    }
                } else {
                    _this.remove();
                }
            }
        });

    });
});