    function getModeleEcritureAPartirDuSchema()
    {
        var schema = $("#schema").val();
        var plan = $("#plan2").val();
        //var societe = $("#nature").val();
        $("#tbody-modele").html("");

        console.log(schema);
        console.log(plan);
        schema = schema.trim();
        plan = plan.trim();

        //On récupère les détails modeles d'écritures
        $("#loader i").css("visibility", "visible");
        xhr = $.ajax({
            url : Routing.generate('charger_modele_a_partir_du_schema'),
            type : 'POST',
            data : 'schema=' + schema + '&plan=' + plan,
            success: function(data, code){
                $("#loader i").css("visibility", "hidden");
                $("#tbody-modele").html(data);
            },
            error: function (resultat, statut, erreur) {
                $("#loader i").css("visibility", "hidden");
            },
        });
  }



$('#typeoperation2').on('change', function(evt, params) {

    var typeoperation = $("#typeoperation2").val();
    var codeplan = $("#plan2").val();

    //On désactive la valiadtion
    $("#btn-getmodele").attr("disabled");

    //On vide les selects
    $('#spanschema').html('<select id="schema" name="schema" data-placeholder="...." class="chosen-select"> </select>');
    //$('#spannature').html('<select id="nature" name="nature" data-placeholder="...." class="chosen-select"> </select>');
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
                $("#spanschema").html(data);
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
    $('#spanschema').html('<select id="schema" name="schema" data-placeholder="...." class="chosen-select"> </select>');
    //$('#spannature').html('<select id="nature" name="nature" data-placeholder="...." class="chosen-select"> </select>');
    $(".chosen-select").chosen({width: "100%"});

});

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
function getNature()
{
    var schema = $("#schema2").val();
        var plan = $("#plan2").val();
        //var societe = $("#nature").val();
        $("#tbody-modele").html("");
        console.log(schema);
        console.log(plan);
        schema = schema.trim();
        plan = plan.trim();

        //On récupère les détails modeles d'écritures
        $("#loader i").css("visibility", "visible");
        xhr = $.ajax({
            url : Routing.generate('charger_modele_a_partir_du_schema'),
            type : 'POST',
            data : 'schema=' + schema + '&plan=' + plan,
            success: function(data, code){
                $("#loader i").css("visibility", "hidden");
                $("#tbody-modele").html(data);
            },
            error: function (resultat, statut, erreur) {
                $("#loader i").css("visibility", "hidden");
            },
        });
}



/*function valeurentre(){

    $('.globale').each(function() {});
        console.log($(this).find(".valeursaisie").val());
        // need this to skip the first row
        console.log($(this).find("td:first").text());
        if ($(this).find("td:first").length > 0) {
            var valeursaisie =  $(this).find(".valeursaisie").val();
            var natureOp =  $(this).find(".natureOp").text();
            var natureId =  $(this).find(".natureId").text();
            var natureSens =  $(this).find(".natureSens").text();
            var natureFormule =  $(this).find(".natureFormule").text();
            var numComptePlan =  $(this).find(".numComptePlan").text();
            var obj = {'natureId':natureId,'valeursaisie':valeursaisie,'natureOp':natureOp,'natureSens':natureSens,'numComptePlan':numComptePlan,natureFormule:natureFormule}
        var cutomerId = $(this).find("td:first").html();
        }


}*/

 $("#sendBoutton").on('click',function(e){
        var operations = [];
        var operationSendToServeurArray = [];
        var natureOperation = null;
        var totaldebit = 0;
        var totalcredit = 0;
        var compteur = 0
   e.preventDefault();
     var libelle  =  $(".libelleOperation").val();
        if(libelle =="undefined" || libelle ==""){
              bootoast.toast({
                      message: 'Veuillez entrer le libelle de l\'operation',
                       icon: 'exclamation-sign', // Glyphicons name,
                       //timeout: 2000,
                       //timeoutProgress: false,
                       animationDuration: 800,
                       position: 'bottom-center',
                       type: 'danger'
                     });
         }else{
    $('#table-modele tr').each(function() {
        //var currentRow=$(this).closest("tr");
       
        var valeursaisie  =  $(this).find(".valeursaisie").val();
        var natureOp      =  $(this).find(".natureOp").text();
        var natureId      =  $(this).find(".natureId").text();
        var natureSens    =  $(this).find(".natureSens").text();
        var natureFormule =  $(this).find(".natureFormule").text();
        var numComptePlan =  $(this).find(".numComptePlan").text();
        if(parseInt(valeursaisie) >= 0 && parseInt(numComptePlan) > 0){
            console.log(compteur+1);
         var objSend = {'valeursaisie':valeursaisie,'natureOperation':natureOperation,'natureId':natureId,'natureOp':natureOp,'natureSens':natureSens,'numComptePlan':numComptePlan,'natureFormule':natureFormule}
            operationSendToServeurArray.push(objSend);
         // need this to skip the first row
          if (natureOperation == null) {
             natureOperation = natureOp;
             if (natureSens == "D") {
                totaldebit = parseInt(valeursaisie)+parseInt(totaldebit)
             } else {
                totalcredit = parseInt(valeursaisie)+parseInt(totalcredit)
             }
          }else{
            if(natureOperation == natureOp && natureSens == "D"){
                 totaldebit = parseInt(valeursaisie)+parseInt(totaldebit)
             }else if(natureOperation == natureOp && natureSens == "C"){
                 totalcredit = parseInt(valeursaisie)+parseInt(totalcredit)
             }else if(natureOperation != natureOp && natureOperation != null && natureOp != undefined && natureOp != ""){
                if(totaldebit == totalcredit){
                    var statut = "success"
                    var code = 200
                }else{
                     var statut = "wrong"
                     var code = 401
                }
                var obj = {'code':code,'natureOperation':natureOperation,'statut': statut,'totaldebit':totaldebit,'totalcredit':totalcredit}
                operations.push(obj);
                totaldebit = 0;
                totalcredit=0;
                natureOperation = natureOp
                if (natureSens =="D") {
                totaldebit = parseInt(valeursaisie)+parseInt(totaldebit)
               } else {
                totalcredit = parseInt(valeursaisie)+parseInt(totalcredit)
               }
             }
          } 
           //console.log(natureOperation);
          //return natureOperation
            }
    });
     if(totaldebit == totalcredit){
                var statut = "success"
                var code = 200
            }else{
                 var statut = "wrong"
                 var code = 401
            }
            var obj = {'code':code,'natureOperation':natureOperation,'statut': statut,'totaldebit':totaldebit,'totalcredit':totalcredit}
            operations.push(obj);
            console.log(operations);
           console.log(operationSendToServeurArray);
           var ckeckVlaue = {}
         $.each(operations, function (index, value) {
            if (value.code == 200) {
                ckeckVlaue.staut=true;
                ckeckVlaue.code=200;
                ckeckVlaue.valueRetour="";
              }else{
                ckeckVlaue.staut=false;
                ckeckVlaue.code=400;
                ckeckVlaue.valueRetour=value;
                return false;
              }
            }); 
            console.log(ckeckVlaue); 
    if (ckeckVlaue.code == 200) {
            var plan = $("#plan2").val();
            var schema = $("#schema2").val();
             var tiers = $("#tiers").val();
             var titres = $("#titres").val();
             $("#messageAlertInfo").css("display", "none"); 
            console.log(schema);
            console.log(plan);
            console.log({table: operationSendToServeurArray,libelle:libelle, plan: plan, schema: schema, tiers: tiers, titres: titres});
            schema = schema.trim();
            plan = plan.trim();
            xhr = $.ajax({
            url : Routing.generate('ecriture_passer_manuelle_schema'),
            type : 'POST',
            data :  {table: operationSendToServeurArray, libelle:libelle,plan: plan, schema: schema, tiers: tiers, titres: titres},
            success: function(data, code){
                $("#loader i").css("visibility", "hidden");
                console.log(data);
                if(data["statut"] == "200"){
                    bootoast.toast({
                      message: data["message"],
                       icon: 'exclamation-sign', // Glyphicons name,
                       //timeout: 2000,
                       //timeoutProgress: false,
                       animationDuration: 800,
                       position: 'bottom-center',
                       type: 'success'
                     });
                }
                else{
                    alert("Erreur : "+ data["message"]);
                   
                }
            },
            error: function (resultat, statut, erreur) {
                $("#loader i").css("visibility", "hidden");
            },
        });
     } else {
        if(ckeckVlaue.code == 400){
             $("#ErrorTotDebit").text(ckeckVlaue.valueRetour.totaldebit); 
             $("#ErrorTotCredit").text(ckeckVlaue.valueRetour.totalcredit); 
             $("#ErrorNatureOpreration").text(ckeckVlaue.valueRetour.natureOperation); 
            $("#messageAlertInfo").css("display", "block"); 
        }
          
        }
    }    
 })
     $("#CloseBtn").on('click',function(e){
        console.log("here we go");
        $("#messageAlertInfo").css("display", "none"); 
     });
 
  /*$("#table-modele").on('blur','.valeursaisie',function(){
                 // get the current row
                   var currentRow=$(this).closest("tr"); 
                    var valeursaisie =  currentRow.find(".valeursaisie").val();
                    var natureOp =  currentRow.find(".natureOp").text();
                    var natureId =  currentRow.find(".natureId").text();
                    var natureSens =  currentRow.find(".natureSens").text();
                    var natureFormule =  currentRow.find(".natureFormule").text();
                    var numComptePlan =  currentRow.find(".numComptePlan").text();
                    var obj = {'natureId':natureId,'natureOp':natureOp,'natureSens':natureSens,'numComptePlan':numComptePlan,natureFormule:natureFormule}
                    var objV = {'natureOp':natureOp,'valeursaisie':valeursaisie,'natureId':natureId}
                     if (operations.length >= 1) {
                        var natureOpArray = natureOpArray.sort(); 
                        for (var i = 0; i < natureOpArray.length - 1; i++) {
                        if (natureOpArray[i + 1].natureOp == natureOp && natureOpArray[i + 1].natureId != natureId) {
                             operations.push(obj);
                             natureOpArray.push(objV);
                        }else{
                            natureOpArray[i + 1].valeursaisie = valeursaisie;
                        }
                        }
                     }else{
                             //operations.push(obj);
                             natureOpArray.push(objV);
                    }

                    if (operations.length >= 1) {
                         $.each(operations, function(index, value ) {
                            console.log(value);
                            if (operations.indexOf(obj) == -1) {
                                 //obj.valeursaisie = valeursaisie
                                  operations.push(obj);
                             }else{
                                
                               // value.valeursaisie = valeursaisie;
                             }
                            if (value.natureSens == natureSens && value.natureId != natureId) {
                                operations.push(obj);
                                 console.log(operations);
                            } else if(value.natureSens == natureSens && value.natureSens != natureSens && value.natureId == natureId){
                                value.valeursaisie = valeursaisie;
                            }
                            return operations
                        });
                    }else{
                             operations.push(obj);
            }
            
    });*/