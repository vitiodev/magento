require(
    [
        'Magento_Ui/js/lib/validation/validator',
        'jquery',
        'mage/translate'
    ], function(validator, $){

        validator.addRule(
            'form-validation',
            function (value) {
                //return true or false based on your logic
                if (value.trim()) {
                    return true;
                } else {
                    return false;
                }
            }
            ,$.mage.__('This field is required!')
        );
    });
