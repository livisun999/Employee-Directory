function createNoty(type, content, ttl) {
        var n = noty({
            text        : content,
            type        : type,
            dismissQueue: true,
            layout      : 'topCenter',
            theme       : 'defaultTheme'
        });
        if(typeof ttl ===  'number'){
            setTimeout(function(){
                $.noty.close(n.options.id);
            }, ttl);
        }
        return n;
    }