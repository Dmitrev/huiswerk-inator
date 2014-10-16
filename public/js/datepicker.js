$(function(){
    var $input = $('.datepicker').pickadate({
    // Format
    format: 'dddd, dd mmm, yyyy',
    formatSubmit: 'yyyy-mm-dd',

    // Strings and translations
    monthsFull: ['januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december'],
    monthsShort: ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'dec'],
    weekdaysFull: ['zondag', 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag'],
    weekdaysShort: ['zo', 'ma', 'di', 'woe', 'do', 'vr', 'za'],

    // Buttons
    today: 'Vandaag',
    clear: 'Leegmaken',
    close: 'Sluiten',


    });

    var picker = $input.pickadate('picker');

    picker.set('disable', [
      1,7
    ]);
});
