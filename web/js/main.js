//MPE data object structure is
//{"diseaseName":"Tétanos néo-natal", "diseaseID":"1", "elementIdInDHIS2":"","total":"1"}
//we assume that the report generating code use to build MPE agregate weekly table 
//add this structure for each row directely in the html code.
//see html code source

// $(function() {
//     //prepare row to push
//     $( "table#ListOfMPE tr td" ).delegate( "button", "click", function() {
//         alert("not implemented review the code"); //comment when done
//         var item = JSON.parse($( this ).attr( "data-rowObject" ));
//         console.log("item: " + item.diseaseName);

//         //TODO: verify data and push if ok
//         pushToDHIS2(item);
//       });
    
//     //bloc update
//     $( "body" ).delegate( "#btnBlockPush", "click", function() {
//         alert("not implemented review the code"); //comment when done
//         var itemCollection = new Array();
//         $( "table#ListOfMPE tr td button" ).each(function(index, btn){
//             itemCollection.push(JSON.parse($( this ).attr( "data-rowObject" )))
//         });
//         console.log("items: " + itemCollection);

//         //TODO: verify data and push if ok
//         blockPushToDHIS2(itemCollection);
//     });

//     //refresh table mpe status
//     $( "body" ).delegate( "#btnRefresh", "click", function() {
//         var itemCollectionFromDHIS2 = getDataFromDHIS2();
//         $( "table#ListOfMPE tbody tr" ).each(function(index, trow){
//             var itemMPE;
//             try {
//                 itemMPE = JSON.parse($( this ).find("button").first().attr( "data-rowObject" ));
//                 console.log("itemMPE: " + JSON.stringify(itemMPE));
//                 var dhis2Item =  itemCollectionFromDHIS2.find( item => item.elementId === itemMPE.elementIdInDHIS2 );
                
//                 //determine le status
//                 if(dhis2Item){ //element found in dhis2 result
//                     console.log("dhis2Item: " + JSON.stringify(dhis2Item));
//                     var status = '<i class="fa fa-minus   fa-fw" style="color:orange"></i>';
//                     if(parseInt(dhis2Item.valueCalulated) < parseInt(itemMPE.total)){
//                         status = '<i class="fa fa-arrow-up   fa-fw" style="color:red"></i>'
//                     }
//                     if(parseInt(dhis2Item.valueCalulated) > parseInt(itemMPE.total)){
//                         status = '<i class="fa fa-arrow-down   fa-fw" style="color:green"></i>'
//                     }
//                     //refresh table row status column of disease
//                     $( this ).find("td.diseaseStatus i").first().remove();
//                     $( this ).find("td.diseaseStatus").first().html(status);
//                 }//
//             } catch (error) {
//                 console.log("error: "+error+'. ligne encours:'+JSON.stringify(itemMPE))
//             }     
            
//         });
//     });
      
// });

//TODO: LAB1, ouvrir une connexion avec dhis2
function connectToDHIS2(){

}

//TODO: LAB2, Envoyer chaque ligne de données individuelle à dhis2
function pushToDHIS2(item){

}

//TODO: LAB2, Envoyer de plusieurs lignes de données individuelle à dhis2
function blockPushToDHIS2(itemCollection){
    
}

//TODO: LAB3, recupération des données
//object structure
//{elementId:'',valueCalulated:0}
function getDataFromDHIS2(){

    //comment test value to test with real data from dhis2
    var items = [{elementId:'a',valueCalulated:0},{elementId:'b',valueCalulated:3},{elementId:'c',valueCalulated:1},{elementId:'d',valueCalulated:1},{elementId:'e',valueCalulated:35}];

    return items;
}




//TODO: Lab4 - Graphique personnalisé ou incrusté 
//Flot Pie Chart
$(function() {
    //TODO: Replace data with correct value
    var data = [{
        label: "Tétanos néo-natal",
        data: 1
    }, {
        label: "Rougeole",
        data: 3
    }, {
        label: "Diarrées sanglante",
        data: 2
    }, {
        label: "Fièvre jaune",
        data: 0
    },{
        label: "Paludisme",
        data: 40
    }];

    var plotObj = $.plot($("#flot-pie-chart"), data, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Bar Chart

$(function() {

    var barOptions = {
        series: {
            bars: {
                show: true,
                barWidth: 43200000
            }
        },
        xaxis: {
            mode: "time",
            timeformat: "%m/%d",
            minTickSize: [1, "day"]
        },
        grid: {
            hoverable: true
        },
        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: "x: %x, y: %y"
        }
    };
    //TODO: Replace data with correct value
    var barData = {
        label: "bar",
        data: [
            [1354521600000, 1000],
            [1355040000000, 2000],
            [1355223600000, 3000],
            [1355306400000, 4000],
            [1355487300000, 5000],
            [1355571900000, 6000]
        ]
    };
    $.plot($("#flot-bar-chart"), [barData], barOptions);

});
