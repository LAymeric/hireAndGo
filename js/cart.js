function fetchPanier()
{
    $.ajax({
        url:'../cart/buildCart.php',
        method:'POST',
        success:function (data) {
            document.getElementById('panier').innerHTML = data;
        }
    });
}

$(document).on('ready',function () {
    fetchPanier();
});

function Add(id)
{
    var price = $('#price'+id).val();
    var quantity = $('#quantity'+id).val();
    var name = $('#name'+id).val();

    //alert("ID : "+id+" Name : "+name+" Price : "+price+" Qunatity : "+quantity);
    var action = "add";
    if(quantity === ""){
        errorPopup()
        return
    }
    $.ajax({
        url:'../cart/actionCart.php',
        type:'POST',
        data:{
            price:price,
            quantity:quantity,
            name:name,
            id:id,
            action:action
        },
        success : function(code, status){
            successPopup()
        },

        error : function(result, status, error){
            errorPopup()
        },

        complete : function(result, status){
        }
    })
}

function del(id)
{
    var action = "del";
    $.ajax({
        url:'../cart/actionCart.php',
        type:'POST',
        data:{
            id:id,
            action:action
        },
        success:function () {
            fetchPanier();
        }
    });
}

function delAll(id)
{
    var action = "delAll";
    $.ajax({
        url:'../cart/actionCart.php',
        type:'POST',
        data:{
            id:id,
            action:action
        },
        success:function ()
        {
            fetchPanier();
        }
    });
}

function update(id)
{
    var up = document.getElementById("quantite"+id).value;
    var action = "upd";
    $.ajax({
        url:'../cart/actionCart.php',
        type:'POST',
        data:{
            id:id,
            quantity:up,
            action:action
        },
        success:function ()
        {
            fetchPanier();

        }
    });

}

function validateCart(id, idCommand)
{
    var arrayServices = []

    var table = document.getElementById("table")
    var   tr = table.getElementsByTagName("tr")
    for(let i = 1; i < tr.length-1 ; i++){
        var td = tr[i].getElementsByTagName("td")
        arrayServices.push({
            idService : td[0].id,
            quantity: td[2].getElementsByTagName("input")[0].value
        })
    }

    $.ajax({ url: 'http://192.168.1.67:8080/api/command/update',
                data: JSON.stringify({
                    idUser:id,
                    services: arrayServices,
                    idCommand : idCommand
                }),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                type: 'POST',
                dataType: "json",
                success : function(code, status){
                    document.location.href="reservationFinal.php?idCommand="+idCommand

                },

                error : function(result, status, error){
                    errorPopup()
                },

                complete : function(result, status){
                }

            });

}

function downloadDevis( idCommand)//TODO
{
    $.ajax({ url: 'http://192.168.1.67:8080/api/command/pdf/'+idCommand,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                type: 'GET',
                dataType: "json",
                success : function(code, status){
                    downloadPDF(code)

                },

                error : function(result, status, error){
                    errorPopup()
                },

                complete : function(result, status){
                }

            });

}

function downloadPDF(file) {
    const linkSource = `data:application/pdf;base64,${file.base64}`;
    const downloadLink = document.createElement("a");
    const fileName = file.fileName;

    downloadLink.href = linkSource;
    downloadLink.download = fileName;
    downloadLink.click();
}
function validateCommand( idCommand)//TODO
{
    $.ajax({ url: 'http://192.168.1.67:8080/api/command/validate/'+idCommand,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                type: 'GET',
                dataType: "json",
                success : function(code, status){
                    //TODO

                },

                error : function(result, status, error){
                    errorPopup()
                },

                complete : function(result, status){
                }

            });

}
function paidCourse( idCommand)//TODO
{
    $.ajax({ url: 'http://192.168.1.67:8080/api/command/paid/'+idCommand,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                type: 'GET',
                dataType: "json",
                success : function(code, status){
                    //TODO

                },

                error : function(result, status, error){
                    errorPopup()
                },

                complete : function(result, status){
                }

            });

}


var isShowing = false;
function successPopup() {
    if(!isShowing){
        isShowing = true;
        var popup = document.getElementById("successPopup");
        popup.className="popuptext show";
        setTimeout(function() {
            popup.className="popuptext invisible";
            isShowing = false;
        },5000);
    }
}
function errorPopup() {
    if(!isShowing) {
        isShowing = true;
        var popup = document.getElementById("errorPopup");
        popup.className="popuptext show";
        setTimeout(function () {
            popup.className="popuptext invisible";
            isShowing = false;
        }, 5000);
    }
}
