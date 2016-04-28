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

        function readURL(input, output) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(output).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        function imgInputPrev(id){
            var input = $(id+" input[type='file']").first();
            var output = $(id+" img.dataPreview").first();
            $(input).change(function(){
                readURL(this, output);
            });
        }