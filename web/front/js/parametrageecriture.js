/**
 * Created by amelina on 22/12/2017.
 */

function getModeleEcriture()
{

    var nature = $("#nature").val();
    var plan = $("#plan2").val();
    //var societe = $("#nature").val();
    $("#tbody-modele").html("");


    nature = nature.trim();
    plan = plan.trim();

    //On récupère les détails modeles d'écritures
    $("#loader i").css("visibility", "visible");
    xhr = $.ajax({
        url : Routing.generate('parametrage_getmodele'),
        type : 'POST',
        data : 'nature=' + nature + '&plan=' + plan,
        success: function(data, code){
            $("#loader i").css("visibility", "hidden");
            $("#tbody-modele").html(data);
        },
        error: function (resultat, statut, erreur) {
            $("#loader i").css("visibility", "hidden");
        },
    });

    //On meta jour les formules
    $("#spanformule").html("");
    $.ajax({
        url : Routing.generate('parametrage_getformule'),
        type : 'POST',
        data : 'codenature=' + nature ,
        success: function(data, code){
            $("#loader i").css("visibility", "hidden");
            $("#spanformule").html(data);
        },
        error: function (resultat, statut, erreur) {
            $("#loader i").css("visibility", "hidden");
        },
    });

}

function saveModeleEcriture()
{

    //alert($('#table-modele'));
    var tablo =  document.getElementById('table-modele');
    var nbre = $('#table-modele tr').length;
    var nature = $("#nature").val();
    var plan = $("#plan2").val();

    if(nbre > 2 && undefined != nature && "" != nature &&  undefined != plan && "" != plan)
    {
        nature = nature.trim();
        plan = plan.trim();
        var k = 0;
        var j = 0;
        var tab = [];
        for (k = 1; k < nbre; k++) {
            tab[k] = [];
            for (j = 0; j < 5; j++) {
                tab[k].push(tablo.rows[k].cells[j].innerHTML.replace(/\&nbsp;/g, '').trim());
            }
        }
        /*
        alert(JSON.stringify(tab));
         $("#spanschema").text(JSON.stringify(tab) + "nature "+nature+" plan "+plan);*/


        //On enregistre les infos
        $("#loader i").css("visibility", "visible");
        xhr = $.ajax({
            url : Routing.generate('parametrage_savemodele'),
            type : 'POST',
            data :  {table: tab, nature: nature, plan: plan},
            success: function(data, code){
                $("#loader i").css("visibility", "hidden");
                if(data["statut"] == "200"){
                    alert("sauvegarde du modèle d'écriture");

                    $('#nature')
                        .find('option')
                        .remove()
                        .end()
                    ;
                    /*swal(
                        'OK',
                        ''+data["message"],
                        'success'
                    );*/
                    $("#tbody-modele").html("");
                }
                else{
                    alert("Erreur : "+ data["message"]);
                    /*swal(
                        'Erreur lors de l enregistrement',
                        ''+data["message"],
                        'error'
                    );*/
                }
            },
            error: function (resultat, statut, erreur) {
                $("#loader i").css("visibility", "hidden");
            },
        });
    }
    else{
        var message = "Les paramètres sont incomplets" ;
        $("#notification_param").html('<div class="alert alert-danger">'+
        +'<i class="fa fa-exclamation fa-fw"></i><strong>'+ message +'</strong>'+
        +' </div>' );
        /*swal(
            'Oops...',
            'Vous ne pouvez pas enregistrer ce modèle car il est incomplet',
            'error'
        );*/
    }



}




$('#typeoperation2').on('change', function(evt, params) {

    var typeoperation = $("#typeoperation2").val();
    var codeplan = $("#plan2").val();

    //On désactive la valiadtion
    $("#btn-getmodele").attr("disabled");

    //On vide les selects
    $('#spanschema2').html('<select id="schema" name="schema" data-placeholder="...." class="chosen-select"> </select>');
    $('#spannature').html('<select id="nature" name="nature" data-placeholder="...." class="chosen-select"> </select>');
    $(".chosen-select").chosen({width: "100%"});

    if(undefined != typeoperation && undefined != codeplan)
    {
        typeoperation = typeoperation.trim();
        codeplan = codeplan.trim();


        $("#loaderschema").css("visibility", "visible");
        xhr = $.ajax({
            url : Routing.generate('parametrage_getschema'),
            type : 'POST',
            data :  'typeop=' + typeoperation + '&codeplan=' + codeplan,
            success: function(data, code){
                $("#loaderschema").css("visibility", "hidden");
                $("#spanschema2").html(data);
            },
            error: function (resultat, statut, erreur) {
                $("#loaderschema").css("visibility", "hidden");
            },
        });
    }
    else{
        /*swal(
            'Oops...',
            'Veuillez choisir le plan et le type d opération!',
            'error'
        );*/
    }
});



$('#plan2').on('change', function(evt, params) {

    //On désactive la valiadtion
    $("#btn-getmodele").attr("disabled");

    //On vide les selects
    $('#spanschema2').html('<select id="schema" name="schema" data-placeholder="...." class="chosen-select"> </select>');
    $('#spannature').html('<select id="nature" name="nature" data-placeholder="...." class="chosen-select"> </select>');
    $(".chosen-select").chosen({width: "100%"});

});


function getNature()
{
    var codeschema = $("#schema2").chosen().val();
    var codeplan = $("#plan2").chosen().val();

    //On vide le select nature
    $('#spannature').html('<select id="nature" name="nature" data-placeholder="...." class="chosen-select"> </select>');
    $(".chosen-select").chosen({width: "100%"});

    //On désactive la valiadtion
    $("#btn-getmodele").attr("disabled");

    if(undefined != codeschema && undefined != codeplan)
    {
        codeschema = codeschema.trim();
        //codeplan = codeplan.trim();

        $("#loadernature").css("visibility", "visible");
        xhr = $.ajax({
            url : Routing.generate('parametrage_getnature'),
            type : 'POST',
            data :  'codeschema=' + codeschema + '&codeplan=' + codeplan,
            success: function(data, code){
                $("#loadernature").css("visibility", "hidden");
                $("#spannature").html(data);
                $("#btn-getmodele").removeAttr("disabled");
            },
            error: function (resultat, statut, erreur) {
                $("#loadernature").css("visibility", "hidden");
            },
        });
    }
    else{
        /*swal(
            'Oops...',
            'Veuillez choisir le plan et unn schéma valide',
            'error'
        );*/
    }
}


$("#addcompte").click(function() {

    var numcompte = $("#comptecomptableparam").text();
    var libelle = $("#libelleparam").text();
    var sens = $("#sens").val();
    var idformule = $("#formulenature").val();
    var formule = $("#formulenature").find("option:selected").text();
    var type = $("#typeparam").val();


    if(undefined == numcompte || numcompte == "" || undefined == sens || sens == "" || undefined == idformule || idformule == ""  || undefined == type || type == ""){

        /*swal(
            'Oops...',
            'Veuillez choisir tous les paramètres',
            'error'
        );*/
        alert("Paramètres manquants")
    }
    else{
        var rowCount = $('#table-modele tr').length;
        var debit = "";
        var credit = "";
        if(sens == "D")
            debit = numcompte;
        else
            credit = numcompte;
        $('#table-modele').append('<tr> '
            +'<td style="display: none;">0</td>'
            +'<td style="display: none;">'+numcompte+'</td>'
            +'<td style="display: none;">'+sens+'</td>'
            +'<td style="display: none;">'+idformule+'</td>'
            +'<td style="display: none;">'+type+'</td>'
            +'<td>'+debit+'</td>'
            +'<td>'+credit+'</td>'
            +'<td>'+libelle+'</td>'
            +'<td>'+formule+'</td>'
            +'<td><a href="#" class="btn btn-danger" onclick="deleterow(this)"><i class="glyphicon glyphicon-minus-sign" aria-hidden="true"></i></a> </td>'
            +'</tr>');
    }

});



function deleterow(r) {
    var tablo = document.getElementById('table-modele');
    var i = r.parentNode.parentNode.rowIndex;
    tablo.deleteRow(i);
    /*  nbre--;
     document.getElementById('tailleTabloExec').value = nbre;*/
}


var xhr;

$("#findcompte").keyup(function(){
    var name = $(this).val();
    var codeplan = $("#plan2").chosen().val();

    $("#result").html("");

    if( (!isNaN(name) && name.length >= 6) || (isNaN(name) && name.length > 3) )
    {
        $( ".loadingContent" ).toggleClass( "displayNone" );
        xhr = $.ajax({
            url : Routing.generate('parametrage_findcompte'),
            type : 'POST',
            data :  'name=' + name + '&codeplan=' + codeplan,
            success: function(data, code){
                $( ".loadingContent" ).toggleClass( "displayNone" );
                $("#result").html(data);
            },
            error: function (resultat, statut, erreur) {
                $( ".loadingContent" ).toggleClass( "displayNone" );
            },
        });
    }
});

function selectCompte(id){

    var compte = $("#search"+id).text().trim();
    var intitule = $("#intitule"+id).text().trim();

    $("#codefinancier").val(compte) ;
    $("#autrecodefin").val(compte) ;
    $("#comptecomptableparam").text(compte) ;
    $("#libelleparam").text(intitule) ;
    $("#intitule").val(intitule) ;
    $('#modalCompte').modal('hide');
    $("#compteclient").focus() ;

}

