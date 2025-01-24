$(document).ready(function(){
        $("#1monthPolCount").show();
        $("#3monthPolCount").hide();
        $("#1yearPolCount").hide();

        $("#1monthPremAmount").show();
        $("#3monthPremAmount").hide();
        $("#1yrPremAmount").hide();

        $("#1monthPremAmountAve").show();
        $("#3monthPremAmountAve").hide();
        $("#1yrPremAmountAve").hide();

        $("#1monthComm").show();
        $("#3monthComm").hide();
        $("#1yrComm").hide();

      });

    function showPol(item) {
      document.getElementById("selectPol").innerHTML = item.innerHTML;
      $("#1monthPolCount").hide();
      $("#3monthPolCount").hide();
      $("#1yearPolCount").hide();
      if(item.innerHTML == 'Last 1 Month'){
        $("#1monthPolCount").show();
      }
      if(item.innerHTML == 'Last 3 Months'){
        $("#3monthPolCount").show();
      }
      if(item.innerHTML == 'Last 1 Year'){
        $("#1yearPolCount").show();
      }
    }

    function showPremium(item) {
      document.getElementById("selectPrem").innerHTML = item.innerHTML;
        $("#1monthPremAmount").hide();
        $("#3monthPremAmount").hide();
        $("#1yrPremAmount").hide();
        $("#1monthPremAmountAve").hide();
        $("#3monthPremAmountAve").hide();
        $("#1yrPremAmountAve").hide();
      if(item.innerHTML == 'Last 1 Month'){
        $("#1monthPremAmount").show();
        $("#1monthPremAmountAve").show();
      }
      if(item.innerHTML == 'Last 3 Months'){
        $("#3monthPremAmount").show();
        $("#3monthPremAmountAve").show();
      }
      if(item.innerHTML == 'Last 1 Year'){
        $("#1yrPremAmount").show();
        $("#1yrPremAmountAve").show();
      }
    }

    function showComm(item) {
      document.getElementById("selectComm").innerHTML = item.innerHTML;
        $("#1monthComm").hide();
        $("#3monthComm").hide();
        $("#1yrComm").hide();
      if(item.innerHTML == 'Last 1 Month'){
        $("#1monthComm").show();
      }
      if(item.innerHTML == 'Last 3 Months'){
        $("#3monthComm").show();
      }
      if(item.innerHTML == 'Last 1 Year'){
        $("#1yrComm").show();
      }
    }