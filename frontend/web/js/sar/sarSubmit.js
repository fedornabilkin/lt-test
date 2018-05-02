;$(document).ready(function(){
    $('form[data-request="ajax"]').on('beforeSubmit', function () {
        AjaxRequest($(this));
        return false;
    });
});