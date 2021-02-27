$(function() {

    $("#btnAdd").on("click",function(){
$("#frm1").validate
({
    rules: {
        codeSrv: {required:true},
        CodeEntrFK: {required:true},
        CodeDepFK : {required:true},
        NomSrv : {required:true},

        fix:{
        required: true,
        number: true
        },

        fax:{
        number: true
        },
      },

      messages: {
        codeSrv: {required:'veuillez insérer code Service *'},
        CodeEntrFK: {required:'veuillez indiquer une entreprise *'},
        CodeDepFK : {required:'veuillez indiquer Quel Departement *'},
        NomSrv : {required:'veuillez insérer code Service *'},
        fix: {required:'veuillez insérer un numéro de téléphone *',number: 'saisi des chiffre svp !!! *'},
        fax: {number:'saisi des chiffre svp !!! *'}
      },
});
});

$("#btnSup").on("click",function(){
$("#frm1").validate
({
    rules: {
        codeSrv: {required:true},
      },

      messages: {
        codeSrv: {required:'veuillez insérer code Service *'}
      },
});
});

$("#btnMod").on("click",function(){
$("#frm1").validate
({
    rules: {
        codeSrv: {required:true},
        CodeEntrFK: {required:true},
        CodeDepFK : {required:true},
        NomSrv : {required:true},

        fix:{
        required: true,
        number: true
        },

        fax:{
        number: true
        },
      },

      messages: {
        codeSrv: {required:'veuillez insérer code Service *'},
        CodeEntrFK: {required:'veuillez indiquer une entreprise *'},
        CodeDepFK : {required:'veuillez indiquer Quel Departement *'},
        NomSrv : {required:'veuillez insérer code Service *'},
        fix: {required:'veuillez insérer un numéro de téléphone *',number: 'saisi des chiffre svp !!! *'},
        fax: {number:'saisi des chiffre svp !!! *'}
      },
});
});
});