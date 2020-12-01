$(document).on('click', '.send_form', function () {
    var input_blanter = document.getElementById('wa_name');

    /* Whatsapp Settings */
    var walink = 'https://api.whatsapp.com/send',
        phone = '62895333616901',
        walink2 = 'Halo Admin warungmakanan',
        text_yes = '',
        text_no = 'Isi semua Formulir lalu klik Kirim.';

    /* Smartphone Support */
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        var walink = 'whatsapp://send';
    }

    if ("" != input_blanter.value) {

        /* Call Input Form */
        var input_select1 = $("#wa_select :selected").text(),
            input_name1 = $("#wa_name").val(),
            input_textarea1 = $("#wa_textarea").val(),
            input_url1 = $("#wa_url").text();

        /* Final Whatsapp URL */
        var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
            '*Nama saya* : ' + input_name1 + '%0A' +
            '*Alamat saya* : ' + input_textarea1 + '%0A' +

            '*web* :' + input_url1 + '%0A';

        /* Whatsapp Window Open */
        window.open(blanter_whatsapp, '_blank');
        document.getElementById("text-info").innerHTML = '<span class="yes">' + text_yes + '</span>';
    } else {
        document.getElementById("text-info").innerHTML = '<span class="no">' + text_no + '</span>';
    }
});