function fNumber(iVal)
{
    var iRes = numeral(iVal).format('0,0');
    return iRes;
}

function ufNumber(iVal)
{
    var myNumeral2 = numeral(iVal);
    var iRes = parseInt(myNumeral2.value());
    return iRes;
}

function genTableDelete()
{
    $('#tblDelete').appendGrid({
        caption: '',
        initRows: 0,
        columns: [
            { 
              name: 'kode', 
              display: 'Kode', 
              type: 'text', 
              ctrlClass: 'form-control gridtext disableinput', 
            },
            { 
              name: 'RecordId', 
              type: 'hidden', 
              value: 0 
            }
        ],

        hideButtons: {
            remove: true,
            append: true,
            insert: true,
            moveUp: true,
            moveDown: true,
            removeLast: true
        }
    });
}


function SubmitData(formname, action)
{
    // $.ajax({
    //     type: "POST",
    //     url: action,
    //     data: $(formname).serialize(),
    //     success:function(result){
    //         var arr = result.split('|');
    //         if(arr[0] != "ok")
    //         {
    //             alertify.alert("KESALAHAN",arr[0]);
    //         }
    //         else
    //         {
    //             document.location = arr[2];
    //         }
    //     }
    // });

    $.ajax({
        url: action,
        type: 'POST',
        data: new FormData($(formname)[0]),
        cache: false,
        contentType: false,
        processData: false,
        success:function(result){
            var arr = result.split('|');
            if(arr[0] != "ok")
            {
                alertify.alert("KESALAHAN",arr[0]);
            }
            else
            {
                document.location = arr[2];
            }
        }
    });
}

function HapusData(action)
{
    alertify.confirm("Hapus data yang dipilih ?.",
    function(){
        $.ajax({
            type: "GET",
            url: action,
            success:function(result){
                var arr = result.split('|');
                if(arr[0] != "ok")
                {
                    alertify.alert("KESALAHAN",arr[0]);
                }
                else
                {
                    document.location = arr[3];
                }
            }
        });
    },
    function(){
        // alertify.error('Cancel');
    });
}

function numberElement()
{
    $(".number").click(function() {
        alert();
    });
}