/******/ (function (modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if (installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
      /******/
    }
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
      /******/
    };
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
    /******/
  }
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function (exports, name, getter) {
/******/ 		if (!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
      /******/
    }
    /******/
  };
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function (exports) {
/******/ 		if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
      /******/
    }
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
    /******/
  };
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function (value, mode) {
/******/ 		if (mode & 1) value = __webpack_require__(value);
/******/ 		if (mode & 8) return value;
/******/ 		if ((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if (mode & 2 && typeof value != 'string') for (var key in value) __webpack_require__.d(ns, key, function (key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
    /******/
  };
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function (module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
    /******/
  };
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function (object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
  /******/
})
/************************************************************************/
/******/({

/***/ "./resources/js/pages/datatables.init.js":
/*!***********************************************!*\
  !*** ./resources/js/pages/datatables.init.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function (module, exports) {

      /*
      Template Name: Nazox - Responsive Bootstrap 4 Admin Dashboard
      Author: Themesdesign
      Contact: themesdesign.in@gmail.com
      File: Datatables Js File
      */


      
      $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
        var filterKey = $('.filter-key');
        var filterOperator = $('.filter-operator');
        var filterValue = $('.filter-value');
        let valid = filterKey.length ;
        for(let i =0 ; i < filterKey.length  ; i++ )
        {
             const keyColumn = filterKey[i].value;
            
           var ToCompareWith ;
           for (let index = 0; index < settings.aoColumns.length; index++) {
               const element = settings.aoColumns[index];
               //console.log(element.sTitle)
               //console.log(filterKey[i].value)
              if(element.sTitle ==keyColumn){ 
                  ToCompareWith =  data[element.idx] ;
                  index = settings.aoColumns.length;
              }else { 
                  ToCompareWith = null;
              } 
             
           }
           console.log( data+'  '+i +'   '  +ToCompareWith+' '+filterOperator[i].value+' '+filterValue[i].value);
          
             var fn 
           if(filterOperator[i].value == "="){
              fn = (ToCompareWith==filterValue[i].value) ;
           }else if(filterOperator[i].value == "<"){
              fn = (Number(ToCompareWith)<Number(filterValue[i].value)) ;
           }else if(filterOperator[i].value == ">"){
              fn = (Number(ToCompareWith)>Number(filterValue[i].value)) ;
           }else if(filterOperator[i].value == "<="){
              fn = (Number(ToCompareWith)<=Number(filterValue[i].value)) ;
           }else if(filterOperator[i].value == ">="){
              fn = (Number(ToCompareWith)>=Number(filterValue[i].value)) ;
           }else if(filterOperator[i].value == "!="){
              fn = (ToCompareWith!=filterValue[i].value) ;
           }else{
              fn = true ;
           }
         if (!fn) {
          --valid  ;
         }
            



         //table.column( ).search( this.value ).draw();
     
     }
     if (valid==filterKey.length) {
          return true ;
         }else{

          return false ;
         }
 }
   ); 





      $(document).ready(function () {
        $('#datatable').DataTable({
          "language": {
            "paginate": {
              "previous": "<i class='mdi mdi-chevron-left'>",
              "next": "<i class='mdi mdi-chevron-right'>"
            }
          },
          "drawCallback": function drawCallback() {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
          },
          
          buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]

        }); //Buttons examples
     var table1 = $('#datatable-buttons').DataTable({
          lengthChange: false,
          "language": {
            "paginate": {
              "previous": "<i class='mdi mdi-chevron-left'>",
              "next": "<i class='mdi mdi-chevron-right'>"
            }
          },
          "drawCallback": function drawCallback() {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
          },
          buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
        });
        table1.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        
     
     $('.filter').on('submit', function (e) {
      e.preventDefault();    
  
      table1.draw();
 
     } );
        var table2 = $('#datatable-buttons1').DataTable({
          lengthChange: false,
          "language": {
            "paginate": {
              "previous": "<i class='mdi mdi-chevron-left'>",
              "next": "<i class='mdi mdi-chevron-right'>"
            }
          },
          "drawCallback": function drawCallback() {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
          },
          buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
        });
        table2.buttons().container().appendTo('#datatable-buttons1_wrapper .col-md-6:eq(0)'); // Multi Selection Datatable

        $('#selection-datatable').DataTable({
          select: {
            style: 'multi'
          },
          "language": {
            "paginate": {
              "previous": "<i class='mdi mdi-chevron-left'>",
              "next": "<i class='mdi mdi-chevron-right'>"
            }
          },
          "drawCallback": function drawCallback() {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
          }
        }); // Key Datatable

        $('#key-datatable').DataTable({
          keys: true,
          "language": {
            "paginate": {
              "previous": "<i class='mdi mdi-chevron-left'>",
              "next": "<i class='mdi mdi-chevron-right'>"
            }
          },
          "drawCallback": function drawCallback() {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
          }
        });
        table2.buttons().container().appendTo('#datatable-buttons1_wrapper .col-md-6:eq(0)'); // Alternative Pagination Datatable

        $('#alternative-page-datatable').DataTable({
          "pagingType": "full_numbers",
          "drawCallback": function drawCallback() {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
          }
        }); // Scroll Vertical Datatable

        $('#scroll-vertical-datatable').DataTable({
          "scrollY": "350px",
          "scrollCollapse": true,
          "paging": false,
          "language": {
            "paginate": {
              "previous": "<i class='mdi mdi-chevron-left'>",
              "next": "<i class='mdi mdi-chevron-right'>"
            }
          },
          "drawCallback": function drawCallback() {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
          }
        }); // Complex headers with column visibility Datatable

        $('#complex-header-datatable').DataTable({
          "language": {
            "paginate": {
              "previous": "<i class='mdi mdi-chevron-left'>",
              "next": "<i class='mdi mdi-chevron-right'>"
            }
          },
          "drawCallback": function drawCallback() {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
          },
          "columnDefs": [{
            "visible": false,
            "targets": -1
          }]
        }); // State Saving Datatable

        $('#state-saving-datatable').DataTable({
          stateSave: true,
          "language": {
            "paginate": {
              "previous": "<i class='mdi mdi-chevron-left'>",
              "next": "<i class='mdi mdi-chevron-right'>"
            }
          },
          "drawCallback": function drawCallback() {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
          }
        });
      });

      /***/
    }),

/***/ 5:
/*!*****************************************************!*\
  !*** multi ./resources/js/pages/datatables.init.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function (module, exports, __webpack_require__) {

      module.exports = __webpack_require__(/*! D:\xampp\htdocs\educa-school\resources\js\pages\datatables.init.js */"./resources/js/pages/datatables.init.js");


      /***/
    })

  /******/
});