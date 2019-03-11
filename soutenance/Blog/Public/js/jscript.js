type="application/javascript">
    $(document ).ready(function() {
        console.log('toto');
        $('.fn_modal_addCom').click(function (e) {
            console.log('gooo');
            if (confirm("Ete vous sur de vouloir modifier ?")) {
                console.log('yesssssssssss')

            } else {
                e.preventDefault();
            }
        })
    });


type="application/javascript">
    $(document ).ready(function() {
        $('.fn_modify_modal').click(function (e) {
            if (confirm("Ete vous sur de vouloir modifier ?")) {
            } else {
                e.preventDefault();
            }
        })
    });