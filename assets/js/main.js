$(document)

// register code
.on("submit", "form.js-register", function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $(".js-error", _form);

    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()       
    }

    if(dataObj.email.length < 6) {
        _error  
            .text("Please enter a valid email address")
            .show();
        return false;
    } else if (dataObj.password.length < 11) {
        _error  
            .text("Please enter a password that is at least 11 characters long.")
            .show(); 
            return false;                   
    }

    // Assuming the code gets this far, we can start the ajax process
    _error.hide();

    $.ajax({
        type: 'POST',
        url: '/php_login_system/ajax/register.php',
        data: dataObj,
        dataType: 'json',
        async: true, 
    })
    .done(function ajaxDone(data) {
        // whatever data is
        if(data.redirect !== undefined) {
             window.location = data.redirect;
             console.log("Redirect");  
        } else if(data.error !== undefined) {
            _error
                .text(data.error)
                .show();
                console.log("Error");  
        }
    })
    .fail(function ajaxFailed(e) {
        // this failed     
        console.log('failed');   
        console.log(e);                  
    })
    .always(function ajaxAlwaysDoThis(data) {
        // always do
        console.log("Always");        
    })

    return false;

})

// log in code
.on("submit", "form.js-login", function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $(".js-error", _form);

    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()       
    }

    if(dataObj.email.length < 6) {
        _error  
            .text("Please enter a valid email address")
            .show();
        return false;
    } else if (dataObj.password.length < 11) {
        _error  
            .text("Please enter a password that is at least 11 characters long.")
            .show(); 
            return false;                   
    }

    // Assuming the code gets this far, we can start the ajax process
    _error.hide();

    $.ajax({
        type: 'POST',
        url: '/php_login_system/ajax/login.php',
        data: dataObj,
        dataType: 'json',
        async: true, 
    })
    .done(function ajaxDone(data) {
        // whatever data is
        if(data.redirect !== undefined) {
             window.location = data.redirect;
             console.log("Redirect");  
        } else if(data.error !== undefined) {
            _error
                .html(data.error)
                .show();
                console.log("Error");  
        }
    })
    .fail(function ajaxFailed(e) {
        // this failed     
        console.log('failed');   
        console.log(e);                  
    })
    .always(function ajaxAlwaysDoThis(data) {
        // always do
        console.log("Always");        
    })

    return false;

})