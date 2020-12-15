


Core = {
    init:function(){
        $(document).ready(function(){
            cPlugins.initAll();
           

            


        });
    },
    
   
    createID:function(){
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for( var i=0; i < 5; i++ )
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }
}


cPlugins = {
    initAll:function(){
        cPlugins.initChosen();

    },

  
    initChosen:function(){
        $(".select").each(function(){
            $(this).chosen();
        });
    },
    
    
}

Core.init();