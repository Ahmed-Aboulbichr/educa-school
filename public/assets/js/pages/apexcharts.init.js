/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/apexcharts.init.js":
/*!***********************************************!*\
  !*** ./resources/js/pages/apexcharts.init.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Nazox - Responsive Bootstrap 4 Admin Dashboard
Author: Themesdesign
Contact: themesdesign.in@gmail.com
File: Apex Chart init js
*/
//  line chart datalabel
var options = {
  chart: {
    height: 380,
    type: 'line',
    zoom: {
      enabled: false
    },
    toolbar: {
      show: false
    }
  },
  colors: ['#5664d2', '#1cbb8c'],
  dataLabels: {
    enabled: true
  },
  stroke: {
    width: [3, 3],
    curve: 'straight'
  },
  series: [{
    name: "High - 2018",
    data: [26, 24, 32, 36, 33, 31, 33]
  }, {
    name: "Low - 2018",
    data: [14, 11, 16, 12, 17, 13, 12]
  }],
  title: {
    text: 'Average High & Low Temperature',
    align: 'left'
  },
  grid: {
    row: {
      colors: ['transparent', 'transparent'],
      // takes an array which will be repeated on columns
      opacity: 0.2
    },
    borderColor: '#f1f1f1'
  },
  markers: {
    style: 'inverted',
    size: 6
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
    title: {
      text: 'Month'
    }
  },
  yaxis: {
    title: {
      text: 'Temperature'
    },
    min: 5,
    max: 40
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    floating: true,
    offsetY: -25,
    offsetX: -5
  },
  responsive: [{
    breakpoint: 600,
    options: {
      chart: {
        toolbar: {
          show: false
        }
      },
      legend: {
        show: false
      }
    }
  }]
};
var chart = new ApexCharts(document.querySelector("#line_chart_datalabel"), options);
chart.render(); //  line chart datalabel

var options = {
  chart: {
    height: 380,
    type: 'line',
    zoom: {
      enabled: false
    },
    toolbar: {
      show: false
    }
  },
  colors: ['#5664d2', '#fcb92c', '#1cbb8c'],
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: [3, 4, 3],
    curve: 'straight',
    dashArray: [0, 8, 5]
  },
  series: [{
    name: "Session Duration",
    data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
  }, {
    name: "Page Views",
    data: [36, 42, 60, 42, 13, 18, 29, 37, 36, 51, 32, 35]
  }, {
    name: 'Total Visits',
    data: [89, 56, 74, 98, 72, 38, 64, 46, 84, 58, 46, 49]
  }],
  title: {
    text: 'Page Statistics',
    align: 'left'
  },
  markers: {
    size: 0,
    hover: {
      sizeOffset: 6
    }
  },
  xaxis: {
    categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan', '10 Jan', '11 Jan', '12 Jan']
  },
  tooltip: {
    y: [{
      title: {
        formatter: function formatter(val) {
          return val + " (mins)";
        }
      }
    }, {
      title: {
        formatter: function formatter(val) {
          return val + " per session";
        }
      }
    }, {
      title: {
        formatter: function formatter(val) {
          return val;
        }
      }
    }]
  },
  grid: {
    borderColor: '#f1f1f1',
    padding: {
      bottom: 5
    }
  },
  legend: {
    offsetY: 5
  }
};
var chart = new ApexCharts(document.querySelector("#line_chart_dashed"), options);
chart.render(); //   spline_area

var options = {
  chart: {
    height: 350,
    type: 'area'
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth',
    width: 3
  },
  series: [{
    name: 'series1',
    data: [34, 40, 28, 52, 42, 109, 100]
  }, {
    name: 'series2',
    data: [32, 60, 34, 46, 34, 52, 41]
  }],
  colors: ['#5664d2', '#1cbb8c'],
  xaxis: {
    type: 'datetime',
    categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"]
  },
  grid: {
    borderColor: '#f1f1f1',
    padding: {
      bottom: 15
    }
  },
  tooltip: {
    x: {
      format: 'dd/MM/yy HH:mm'
    }
  },
  legend: {
    offsetY: 7
  }
};
var chart = new ApexCharts(document.querySelector("#spline_area"), options);
chart.render(); // column chart

var options = {
  chart: {
    height: 350,
    type: 'bar',
    toolbar: {
      show: false
    }
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '45%',
      endingShape: 'rounded'
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  series: [{
    name: 'Net Profit',
    data: [46, 57, 59, 54, 62, 58, 64, 60, 66]
  }, {
    name: 'Revenue',
    data: [74, 83, 102, 97, 86, 106, 93, 114, 94]
  }, {
    name: 'Free Cash Flow',
    data: [37, 42, 38, 26, 47, 50, 54, 55, 43]
  }],
  colors: ['#5664d2', '#1cbb8c', '#fcb92c'],
  xaxis: {
    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct']
  },
  yaxis: {
    title: {
      text: '$ (thousands)'
    }
  },
  grid: {
    borderColor: '#f1f1f1',
    padding: {
      bottom: 10
    }
  },
  fill: {
    opacity: 1
  },
  tooltip: {
    y: {
      formatter: function formatter(val) {
        return "$ " + val + " thousands";
      }
    }
  },
  legend: {
    offsetY: 7
  }
};
var chart = new ApexCharts(document.querySelector("#column_chart"), options);
chart.render(); // column chart with datalabels

var options = {
  chart: {
    height: 350,
    type: 'bar',
    toolbar: {
      show: false
    }
  },
  plotOptions: {
    bar: {
      dataLabels: {
        position: 'top' // top, center, bottom

      }
    }
  },
  dataLabels: {
    enabled: true,
    formatter: function formatter(val) {
      return val + "%";
    },
    offsetY: -20,
    style: {
      fontSize: '12px',
      colors: ["#304758"]
    }
  },
  series: [{
    name: 'Inflation',
    data: [2.5, 3.2, 5.0, 10.1, 4.2, 3.8, 3, 2.4, 4.0, 1.2, 3.5, 0.8]
  }],
  colors: ['#5664d2'],
  grid: {
    borderColor: '#f1f1f1',
    padding: {
      bottom: 10
    }
  },
  xaxis: {
    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    position: 'top',
    labels: {
      offsetY: -18
    },
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      fill: {
        type: 'gradient',
        gradient: {
          colorFrom: '#D8E3F0',
          colorTo: '#BED1E6',
          stops: [0, 100],
          opacityFrom: 0.4,
          opacityTo: 0.5
        }
      }
    },
    tooltip: {
      enabled: true,
      offsetY: -35
    }
  },
  fill: {
    gradient: {
      shade: 'light',
      type: "horizontal",
      shadeIntensity: 0.25,
      gradientToColors: undefined,
      inverseColors: true,
      opacityFrom: 1,
      opacityTo: 1,
      stops: [50, 0, 100, 100]
    }
  },
  yaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    labels: {
      show: false,
      formatter: function formatter(val) {
        return val + "%";
      }
    }
  },
  title: {
    text: 'Monthly Inflation in Argentina, 2002',
    floating: true,
    offsetY: 320,
    align: 'center',
    style: {
      color: '#444'
    }
  },
  legend: {
    offsetY: 7
  }
};
var chart = new ApexCharts(document.querySelector("#column_chart_datalabel"), options);
chart.render(); // Bar chart

var options = {
  chart: {
    height: 350,
    type: 'bar',
    toolbar: {
      show: false
    }
  },
  plotOptions: {
    bar: {
      horizontal: true
    }
  },
  dataLabels: {
    enabled: false
  },
  series: [{
    data: [380, 430, 450, 475, 550, 584, 780, 1100, 1220, 1365]
  }],
  colors: ['#1cbb8c'],
  grid: {
    borderColor: '#f1f1f1',
    padding: {
      bottom: 5
    }
  },
  xaxis: {
    categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan', 'United States', 'China', 'Germany']
  },
  legend: {
    offsetY: 5
  }
};
var chart = new ApexCharts(document.querySelector("#bar_chart"), options);
chart.render(); // Mixed chart

var options = {
  chart: {
    height: 350,
    type: 'line',
    stacked: false,
    toolbar: {
      show: false
    }
  },
  stroke: {
    width: [0, 2, 4],
    curve: 'smooth'
  },
  plotOptions: {
    bar: {
      columnWidth: '50%'
    }
  },
  colors: ['#1cbb8c', '#fcb92c', '#5664d2'],
  series: [{
    name: 'Team A',
    type: 'column',
    data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
  }, {
    name: 'Team B',
    type: 'area',
    data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
  }, {
    name: 'Team C',
    type: 'line',
    data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
  }],
  fill: {
    opacity: [0.85, 0.25, 1],
    gradient: {
      inverseColors: false,
      shade: 'light',
      type: "vertical",
      opacityFrom: 0.85,
      opacityTo: 0.55,
      stops: [0, 100, 100, 100]
    }
  },
  labels: ['01/01/2003', '02/01/2003', '03/01/2003', '04/01/2003', '05/01/2003', '06/01/2003', '07/01/2003', '08/01/2003', '09/01/2003', '10/01/2003', '11/01/2003'],
  markers: {
    size: 0
  },
  xaxis: {
    type: 'datetime'
  },
  yaxis: {
    title: {
      text: 'Points'
    }
  },
  tooltip: {
    shared: true,
    intersect: false,
    y: {
      formatter: function formatter(y) {
        if (typeof y !== "undefined") {
          return y.toFixed(0) + " points";
        }

        return y;
      }
    }
  },
  grid: {
    borderColor: '#f1f1f1',
    padding: {
      bottom: 10
    }
  },
  legend: {
    offsetY: 7
  }
};
var chart = new ApexCharts(document.querySelector("#mixed_chart"), options);
chart.render(); //  Radial chart

var options = {
  chart: {
    height: 350,
    type: 'radialBar'
  },
  plotOptions: {
    radialBar: {
      dataLabels: {
        name: {
          fontSize: '22px'
        },
        value: {
          fontSize: '16px'
        },
        total: {
          show: true,
          label: 'Total',
          formatter: function formatter(w) {
            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
            return 249;
          }
        }
      }
    }
  },
  series: [44, 55, 67, 83],
  labels: ['Computer', 'Tablet', 'Laptop', 'Mobile'],
  colors: ['#5664d2', '#fcb92c', '#1cbb8c', '#ff3d60'],
  legend: {
    offsetY: 5
  }
};
var chart = new ApexCharts(document.querySelector("#radial_chart"), options);
chart.render(); // pie chart

var options = {
  chart: {
    height: 320,
    type: 'pie'
  },
  series: [44, 55, 41, 17, 15],
  labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"],
  colors: ["#1cbb8c", "#5664d2", "#fcb92c", "#4aa3ff", "#ff3d60"],
  legend: {
    show: true,
    position: 'bottom',
    horizontalAlign: 'center',
    verticalAlign: 'middle',
    floating: false,
    fontSize: '14px',
    offsetX: 0,
    offsetY: 5
  },
  responsive: [{
    breakpoint: 600,
    options: {
      chart: {
        height: 240
      },
      legend: {
        show: false
      }
    }
  }]
};
var chart = new ApexCharts(document.querySelector("#pie_chart"), options);
chart.render(); // Donut chart

var options = {
  chart: {
    height: 320,
    type: 'donut'
  },
  series: [44, 55, 41, 17, 15],
  labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"],
  colors: ["#1cbb8c", "#5664d2", "#fcb92c", "#4aa3ff", "#ff3d60"],
  legend: {
    show: true,
    position: 'bottom',
    horizontalAlign: 'center',
    verticalAlign: 'middle',
    floating: false,
    fontSize: '14px',
    offsetX: 0,
    offsetY: 5
  },
  responsive: [{
    breakpoint: 600,
    options: {
      chart: {
        height: 240
      },
      legend: {
        show: false
      }
    }
  }]
};
var chart = new ApexCharts(document.querySelector("#donut_chart"), options);
chart.render();

/***/ }),

/***/ "./resources/scss/app-dark.scss":
/*!**************************************!*\
  !*** ./resources/scss/app-dark.scss ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/app-rtl.scss":
/*!*************************************!*\
  !*** ./resources/scss/app-rtl.scss ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/app.scss":
/*!*********************************!*\
  !*** ./resources/scss/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/bootstrap-dark.scss":
/*!********************************************!*\
  !*** ./resources/scss/bootstrap-dark.scss ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/bootstrap.scss":
/*!***************************************!*\
  !*** ./resources/scss/bootstrap.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/icons.scss":
/*!***********************************!*\
  !*** ./resources/scss/icons.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*********************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./resources/js/pages/apexcharts.init.js ./resources/scss/bootstrap.scss ./resources/scss/bootstrap-dark.scss ./resources/scss/icons.scss ./resources/scss/app-rtl.scss ./resources/scss/app.scss ./resources/scss/app-dark.scss ***!
  \*********************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\xampp\htdocs\educa-school\resources\js\pages\apexcharts.init.js */"./resources/js/pages/apexcharts.init.js");
__webpack_require__(/*! D:\xampp\htdocs\educa-school\resources\scss\bootstrap.scss */"./resources/scss/bootstrap.scss");
__webpack_require__(/*! D:\xampp\htdocs\educa-school\resources\scss\bootstrap-dark.scss */"./resources/scss/bootstrap-dark.scss");
__webpack_require__(/*! D:\xampp\htdocs\educa-school\resources\scss\icons.scss */"./resources/scss/icons.scss");
__webpack_require__(/*! D:\xampp\htdocs\educa-school\resources\scss\app-rtl.scss */"./resources/scss/app-rtl.scss");
__webpack_require__(/*! D:\xampp\htdocs\educa-school\resources\scss\app.scss */"./resources/scss/app.scss");
module.exports = __webpack_require__(/*! D:\xampp\htdocs\educa-school\resources\scss\app-dark.scss */"./resources/scss/app-dark.scss");


/***/ })

/******/ });