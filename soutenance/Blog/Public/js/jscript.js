 $(document ).ready(function() {
     $('.fn_modify_modal').click(function (e) {
         if (confirm("Ete vous sur de vouloir confirmer ?")) {
         } else {
             e.preventDefault();
         }
     })
    });