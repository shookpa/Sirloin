/**
 * 
 */

$(function() {
    var _0x34b2x1 = $('#Menu_HfIsInAccount')['val']();
    var _0x34b2x2 = $('#Menu_HfIsAnonymous')['val']();
    if (_0x34b2x1 == '1') {
        $('#li_active')['addClass']('active');
        $('#li_activemobile')['addClass']('active')
    } else {
        $('#li_active')['removeClass']('active');
        $('#li_activemobile')['removeClass']('active');
        if (_0x34b2x2 == '1') {
            $('#quees_session')['removeClass']('vacio')
        } else {
            $('#quees_session')['addClass']('vacio')
        }
    };
    $('#close_session')['click'](function() {
    	sessionStorage.clear();
        location['href'] = 'index.php';
    });
    $('#myaccount')['click'](function() {
        location['href'] = 'info_personal.php'
    });
    $('#mobilemyaccount')['click'](function() {
        location['href'] = 'info_personal.php'
    });
    $('#whatis')['click'](function() {
        location['href'] = 'home.php#quees_session'
    });
    $('#quees')['click'](function() {
        location['href'] = 'home.php#quees_session'
    });
    $('#mobilewhatis')['click'](function() {
        location['href'] = 'home.php#quees_session'
    });
    $('#howitwork')['click'](function() {
        location['href'] = 'home.php#como_session'
    });
    $('#mobilehowitwork')['click'](function() {
        location['href'] = 'home.php#como_session'
    });
    $('#promotions')['click'](function() {
        location['href'] = 'home.php#promo_session'
    });
    $('#mobilepromotions')['click'](function() {
        location['href'] = 'home.php#promo_session'
    });
    $('#contacto')['click'](function() {
        location['href'] = 'home.php#contact'
    });
    $('#mobilecontact')['click'](function() {
        location['href'] = 'index.php#contact'
    });
    $('#Menu_section_personal_data')['click'](function() {
        location['href'] = 'info_personal.php'
    });
    $('#Menu_section_account_status')['click'](function() {
        location['href'] = 'estado_cuenta.php'
    });
    $('#Menu_section_access_data')['click'](function() {
        location['href'] = 'datos_acceso.php'
    });
    $('#Menu_section_cancel_by')['click'](function() {
        location['href'] = 'cancelar.php'
    });
    $('#login')['click'](function() {
        $('html, body')['delay'](400)['animate']({
            scrollTop: $('.anchor')['offset']()['top']
        }, 2000)
    });
    $('#login_mobile')['click'](function() {
        $('html, body')['delay'](400)['animate']({
            scrollTop: $('.anchor')['offset']()['top']
        }, 2000)
    });
    $('#logo_index_1')['click'](function() {
        window['open']('http://sirloin.soft-webcosmos.com.mx/')
    });
    $('#logo_index_3')['click'](function() {
        window['open']('http://sirloin.soft-webcosmos.com.mx/')
    });
    $('#logo_index_6')['click'](function() {
        window['open']('http://sirloin.soft-webcosmos.com.mx/')
    });
    $('#downloadApp')['click'](function() {
        $('html, body')['delay'](400)['animate']({
            scrollTop: $('.social-icons')['offset']()['top']
        }, 2000)
    });
    $('#downloadAppMobile')['click'](function() {
        $('html, body')['delay'](400)['animate']({
            scrollTop: $('.social-icons')['offset']()['top']
        }, 2000)
    })
})