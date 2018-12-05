
//Mascara de formulario
$(document).ready(function() {
   jQuery(function($){
      $('#cpf').mask("999.999.999-99");
      $("#phone1").mask("(99)9999-9999");
      $("#phone2").mask("(99)99999-9999");
      $("#cep").mask("99999-999");
      $("#phone1School").mask("(99)9999-9999");
      $("#phone2School").mask("(99)99999-9999");
      $("#cepSchool").mask("99999-999");

   });
});


//Buscar Endereço pelo CEP Usuario
$(document).ready(function() {
    function clean_form_cep() {
                // Limpa valores do formulário de cep.
                $("#address").val("");
                $("#district").val("");
                $("#city").val("");
                $("#state").val("");
            }
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {
                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');
                //Verifica se campo cep possui valor informado.
                if (cep != "") {
                    //Expressão regular para validar o CEP.
                    var validatecep = /^[0-9]{8}$/;
                    //Valida o formato do CEP.
                    if(validatecep.test(cep)) {
                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#address").val("...");
                        $("#district").val("...");
                        $("#city").val("...");
                        $("#state").val("...");
                        //$("#compl").val("...");
                        //$("#phone1").val("...");
                        //$("#phone2").val("...");
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(data) {

                            if (!("erro" in data)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#address").val(data.logradouro);
                                $("#district").val(data.bairro);
                                $("#city").val(data.localidade);
                                $("#state").val(data.uf);
                                
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                clean_form_cep();
                                alert("CEP not found.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        clean_form_cep();
                        alert("Invalid CEP format.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    clean_form_cep();
                }
            });
        });
//Buscar Endereço pelo CEP School
$(document).ready(function() {

    function clean_form_cep() {
                // Limpa valores do formulário de cep.
                $("#addressSchool").val("");
                $("#districtSchool").val("");
                $("#citySchool").val("");
                $("#stateSchool").val("");

            }
            //Quando o campo cep perde o foco.
            $("#cepSchool").blur(function() {
                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');
                //Verifica se campo cep possui valor informado.
                if (cep != "") {
                    //Expressão regular para validar o CEP.
                    var validatecep = /^[0-9]{8}$/;
                    //Valida o formato do CEP.
                    if(validatecep.test(cep)) {
                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#addressSchool").val("...");
                        $("#districtSchool").val("...");
                        $("#citySchool").val("...");
                        $("#stateSchool").val("...");
                        //$("#compl").val("...");
                        //$("#phone1").val("...");
                        //$("#phone2").val("...");
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(data) {

                            if (!("erro" in data)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#addressSchool").val(data.logradouro);
                                $("#districtSchool").val(data.bairro);
                                $("#citySchool").val(data.localidade);
                                $("#stateSchool").val(data.uf);
                                
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                clean_form_cep();
                                alert("CEP not found.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        clean_form_cep();
                        alert("Invalid CEP format.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    clean_form_cep();
                }
            });
        });

/*//Codigo Escola
$(document).ready(function(){
   var nameS =  $('#nameSchool').val();
   var cityS =  $('#citySchool').val();
   var  ufS = $("#stateSchool").val();
   $("#cepSchool").blur(function() {
      $.getJSON("http://educacao.dadosabertosbr.com/api/escolas?nome="+nameS, function(data) {
         if (!("erro" in data)) {
            if (data.estado==ufS) && (data.cidade) {
               $("#codeSchool").val(data);
            }
         }
      });
   });

});
*/


//Confirmar senha
$(document).ready(function(){

    $("#cpass").blur(function(){
        var password = $("#pass").val();
        var confirm_password = $("#cpass").val();
        if(password != confirm_password){
            alert("Password not confirmed!");
            $("#cpass").val("");
            $("#cpass").attr("placeholder", "Different password").placeholder; 
        }
    });

    $("#cpassSchool").blur(function(){
        var password = $("#passSchool ").val();
        var confirm_password = $("#cpassSchool").val();
        if(password != confirm_password){
            alert("Password not confirmed!");
            $("#cpassSchool").val("");
            $("#cpassSchool").attr("placeholder", "Different password").placeholder; 
        }
    });
});


// Cidades e Estados

$(document).ready(function () {


    $.getJSON('../js/json/estados_cidades.json', function (data) {

        var items = [];
        var options = '<option value="" disabled selected hidden>Select a state</option>';    

        $.each(data, function (key, val) {
            options += '<option value="' + val.initials + '">' + val.name + '</option>';
        });                 
        $("#uf").html(options);                

        $("#uf").change(function () { 
            var tet = $("#uf option:selected").val();             
            if (tet != "") {
                $("#idCity").show();
                var op_city = '';
                var str = "";                   

                $("#uf option:selected").each(function () {
                    str += $(this).text();
                });

                $.each(data, function (key, val) {
                    if(val.name == str) {                           
                        $.each(val.city, function (key_city, val_city) {
                            op_city += '<option value="' + val_city + '">' + val_city + '</option>';
                        });                         
                    }
                });

                $("#city").html(op_city);
            } 
        }).change();        

    });

});


// $(document).ready(function () {

//         mapschoolsearch();
// });


// function mapschoolsearch() {
//         var map, infoWindow;
//         map = new google.maps.Map(document.getElementById('mapshool'), {
//           center: {lat: -34.397, lng: 150.644},
//           zoom: 6
//         });
//         infoWindow = new google.maps.InfoWindow;

//         // Try HTML5 geolocation.
//         if (navigator.geolocation) {
//           navigator.geolocation.getCurrentPosition(function(position) {
//             var pos = {
//               lat: position.coords.latitude,
//               lng: position.coords.longitude
//             };

//             infoWindow.setPosition(pos);
            
//             infoWindow.open(map);
//             map.setCenter(pos);
//           }, function() {
//             handleLocationError(true, infoWindow, map.getCenter());
//           });
//         } else {
//           // Browser doesn't support Geolocation
//           handleLocationError(false, infoWindow, map.getCenter());
//         }
//       }

//       function handleLocationError(browserHasGeolocation, infoWindow, pos) {
//         infoWindow.setPosition(pos);
//         infoWindow.setContent(browserHasGeolocation ?
//                               'Error: The Geolocation service failed.' :
//                               'Error: Your browser doesn\'t support geolocation.');
//         infoWindow.open(map);
//       }
/*
// Switch Alter Students
$(document).ready(function(){
    $("#eduStd").change(function(){
    var op = " "
    op = $('#eduStd').val();

    switch(op){
        case "Elementary School":
            $("#elementaryStd").show();
            $("#middleStd").hide();
            $("#highStd").hide();
            break;
        case 'Middle School':
            $("#middleStd").show();
            $("#highStd").hide();
            $("#elementaryStd").hide();
            break;
        case 'High School':
            $("#highStd").show();
            $("#middleStd").hide();
            $("#elementaryStd").hide();
            break;
    }
});

});

*/
/*
    var cont=0;
    var alt ="alter";
    var std = "std";
    var d = "div#";
    var c = "#"
    var a = "'";
    var red = d.concat(alt,cont,std);
    var res = c.concat(alt,cont,std); 
    
    while($(red).length){
        alert(res);
        $(res).ready(function(){
            alert(res);
        (function(angular) {
          'use strict';
          angular.module('switch_regStd', ['ngAnimate'])
          .controller('GradeController', ['$scope', function($scope) {
            $scope.items = ['Elementary School', 'Middle School', 'High School'];
    //$scope.selection = $scope.items[0];
}]);
      });
      });
    cont = cont + 1;
    red = d.concat(alt,cont,std);
    res = c.concat(alt,cont,std);   
  }
*/

/*
function myFunction() {
   (function(angular) {
      'use strict';
      angular.module('switch_regStd', ['ngAnimate'])
      .controller('GradeController', ['$scope', function($scope) {
        $scope.items = ['Elementary School', 'Middle School', 'High School'];
    //$scope.selection = $scope.items[0];
}]);
  })(window.angular);
}*/
/*
$(document).ready(function(){
    var swi = '';
    for (var i = 0; i < Things.length; i++) {
        swi = swi.concat("switch",,"altstd");
        (function(angular) {
          'use strict';
          angular.module(switch, ['ngAnimate'])
          .controller('GradeController', ['$scope', function($scope) {
            $scope.items = ['Elementary School', 'Middle School', 'High School'];
    //$scope.selection = $scope.items[0];
            }]);
        })(window.angular);

  }

});
*/

