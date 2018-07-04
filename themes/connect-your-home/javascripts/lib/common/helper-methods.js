// set, get and check cookies
function setCookie(cname, cvalue, exdays) {
    console.log('setting cookie', cname + " " + cvalue + " " + exdays)
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    Cookies.set(cname, cvalue, {
        expires: d
    });
}

function getCookie(cname) {
    return Cookies.get(cname);
}

function checkCookie() {
    var cyhAddress = getCookie("fullAddress");
    if (cyhAddress != "") {
        $('#address, #homeSearch, #search-services').val(cyhAddress);
    }
}