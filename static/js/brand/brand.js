$(document).ready(
    function() {
        $('a.bIc-slide-prev').click(function() {
            slide(this, 'prev');
        });

        $('a.bIc-slide-next').click(function() {
            slide(this, 'next');
        });
    }
);

function slide(ele, type) {
    if(type == 'prev') {
        ullist = $(ele).next('.brand_item_cont_slide').find('ul.bIc-slideList');
    } else {
        ullist = $(ele).prev('.brand_item_cont_slide').find('ul.bIc-slideList');
    }

    left_pos = ullist.css('left').toLowerCase();
    left_pos = left_pos.replace('px', '');
    left_pos = parseInt(left_pos);
    if(type == 'next') {
        if(left_pos >= -720) {
            left_pos -= 720;
            ullist.animate({left: String(left_pos) + "px"}, "slow");
//            ullist.css('left', String(left_pos) + "px");
            $(ele).siblings('a.bIc-slide-prev').removeClass('ks-switchable-disable-btn');
            if(left_pos == -720*2) {
                $(ele).addClass('ks-switchable-disable-btn');
            }
        } else {
            $(ele).addClass('ks-switchable-disable-btn');
        }
    } else {
        if(left_pos <= -720) {
            left_pos += 720;
//            ullist.css('left', String(left_pos) + "px");
            ullist.animate({left: String(left_pos) + "px"}, "slow");
            $(ele).siblings('a.bIc-slide-next').removeClass('ks-switchable-disable-btn');
            if(left_pos == 0) {
                $(ele).addClass('ks-switchable-disable-btn');
            }
        } else {
            $(ele).addClass('ks-switchable-disable-btn');
        }
    }
}