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