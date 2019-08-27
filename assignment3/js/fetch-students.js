$(document).ready(function() {

  //define Select
  var select = document.getElementById("slot");

  //define updateTable
  var table = document.getElementById("students-table");
  var table_head = document.getElementById("students-table-head");
  var table_body = document.getElementById("students-table-body");


  $.post("../php/fetch-slot.php", {

    },
    function(data) {
      var objData = jQuery.parseJSON(data);

      for (var i = 0; i < objData.length; i++) {
        var option = document.createElement("option");
        option.text = objData[i][0] + '\xa0\xa0\xa0\xa0\xa0\xa0\xa0' + objData[i][1] + " seats available" + '\xa0\xa0\xa0\xa0\xa0\xa0\xa0' + objData[i][2] + " seats reserved";
        option.value = objData[i][0];

        select.appendChild(option);
      }
    });


  // set default all value
  updateTable("default");

  //on change update table data
  select.onchange = function() {
    updateTable("default");
  };


  function updateTable(from) {

    table_body.innerHTML = "";

    var val = "";
    var queryType = "";

    if (from == "default") {
      val = select.value;
      queryType = "default";
    } else {
      val = from;
      queryType = "search";
    }


    $.post("../php/fetch-students.php", {
        type: queryType,
        values: val
      },
      function(data) {
        var objData = jQuery.parseJSON(data);

        if (objData.length == 0) {
          table_head.style.display = "none";
          table_body.innerHTML = "NO DATA FOUND";
        }


        for (var i = 0; i < objData.length; i++) {
          var row = table_body.insertRow(i);
          row.insertCell(0).innerHTML = i + 1;
          row.insertCell(1).innerHTML = objData[i][1];
          row.insertCell(2).innerHTML = objData[i][2];
          row.insertCell(3).innerHTML = objData[i][3];
          row.insertCell(4).innerHTML = objData[i][4];

          //var editCell = row.insertCell(5);
          var deleteCell = row.insertCell(5);

          //editCell.innerHTML = '<i class="fas fa-pencil-alt text-info mr-1" style="cursor: pointer;"></i>';
          deleteCell.innerHTML = '<i class="far fa-trash-alt text-warning" style="cursor: pointer;"></i>';

          //editCell.id = objData[i][0];
          deleteCell.id = objData[i][0];

          //editCell.onclick = function() { editRow(this.id);}
          deleteCell.onclick = function() {
            deleteRow(this.id);
          }
        }
      });
  }


  function editRow(id) {
    alert(id);
  }


  function deleteRow(id) {
    var r = confirm("Contirm delete?");
    if (r == true) {
      $.post("../php/studentsHelper.php", {
          method: "delete",
          id: id
        },
        function(data) {
          if (data == "successfully") {
            alert("delete successfully");
            updateTable("default");
            searchBox.value = "";
          } else {
            alert("delete failed");
          }
        });
    }
  }


  // SEARCH

  //define search button
  var searchBtn = document.getElementById("search");
  var searchBox = document.getElementById("search-value");

  //click search button
  searchBtn.onclick = function search() {
    if (searchBox.value == "") {
      alert("Please enter email or student id");
    } else {
      updateTable(searchBox.value);
    }

  };


});
