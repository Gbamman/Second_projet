/**
 * Created by amelina on 22/12/2017.
 */

$('#datetimepicker1').datetimepicker( {
    locale: 'fr',
    viewMode: 'days',
    format: 'DD/MM/YYYY'
});
$('#datetimepicker2').datetimepicker( {
    locale: 'fr',
    useCurrent: false,
    viewMode: 'days',
    format: 'DD/MM/YYYY'
});



function saveModeleEcriture()
{

    //alert($('#table-modele'));
    var tablo =  document.getElementById('table-modele');
    var nbre = $('#table-modele tr').length;
    var journal = $("#journal2").val();
    var plan = $("#plan2").val();
    var datesaisie = $("#date_saisie").val();
    var dateoperation = $("#date_operation").val();

    if(nbre > 2 && undefined != journal && "" != journal &&  undefined != plan && "" != plan && undefined != plan && "" != plan)
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
            url : Routing.generate('ecriture_passer_manuelle'),
            type : 'POST',
            data :  {table: tab, journal: journal, plan: plan, datesaisie: datesaisie, dateoperation: dateoperation},
            success: function(data, code){
                $("#loader i").css("visibility", "hidden");
                if(data["statut"] == "200"){
                    alert("passage des écritures");

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




$('#plan2').on('change', function(evt, params) {

    var codeplan = $("#plan2").val();



    //On vide les selects
    $('#spanjournal').html('<select id="journal2" name="journal2" data-placeholder="...." class="chosen-select"> </select>');
    $('#spantiers').html('<select id="tiers2" name="tiers2" data-placeholder="...." class="chosen-select"> </select>');
    $(".chosen-select").chosen({width: "100%"});

    if( undefined != codeplan)
    {
        codeplan = codeplan.trim();

        $("#loaderschema").css("visibility", "visible");
        xhr = $.ajax({
            url : Routing.generate('ecriture_getjournaux'),
            type : 'POST',
            data :  'plan=' + codeplan ,
            success: function(data, code){
                $("#loaderschema").css("visibility", "hidden");
                $("#spanjournal").html(data);
            },
            error: function (resultat, statut, erreur) {
                $("#loaderschema").css("visibility", "hidden");
            },
        });

         xhr = $.ajax({
            url : Routing.generate('ecriture_gettiers'),
            type : 'POST',
            data :  'plan=' + codeplan ,
            success: function(data, code){
                $("#spantiers").html(data);
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




$("#passerecriture").click(function() {

});

$("#addcompte").click(function() {

    var numcompte = $("#comptecomptableparam").text();
    var libelle = $("#libelleparam").text();
    var montant = $("#montant").val();
    var sens = $("#sens").val();
    var codetiers = $("#tiers2").val();
    var tiers = $("#tiers2").find("option:selected").text();


    if(undefined == numcompte || numcompte == "" || undefined == sens || sens == "" || undefined == montant || "" == montant){

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
            +'<td style="display: none;">'+montant+'</td>'
            +'<td style="display: none;">'+codetiers+'</td>'
            +'<td>'+debit+'</td>'
            +'<td>'+credit+'</td>'
            +'<td>'+libelle+'</td>'
            +'<td>'+montant+'</td>'
            +'<td>'+tiers+'</td>'
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

    $("#comptecomptableparam").text(compte) ;
    $("#libelleparam").text(intitule) ;
    $("#intitule").val(intitule) ;
    $('#modalCompte').modal('hide');
    $("#compteclient").focus() ;

}
