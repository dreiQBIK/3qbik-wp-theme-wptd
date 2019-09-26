const fmUploadBtn = (function($) {

    // DOCS: http://markusslima.github.io/jquery-filestyle/options.html

    $(":file").jfilestyle({
        theme: "blue",
        text: "Auswählen",
        buttonBefore: true,
        placeholder: "Deine Datei",
        disabled: false
    });

})(jQuery);
