$(document).ready(function() {

//define table body
var table_body = document.getElementById("coun-table-body");

//define
var closeBtn = document.getElementById("closeBtn");
var label = document.getElementById("labelDay");
var timeBox = document.getElementById("inTime");
var totalSeatBox = document.getElementById("inSeat");
var updateSection = document.getElementById("update-section");
updateSection.style.display = "none";

closeBtn.onclick = function closeEditSection() {
  updateSection.style.display = "none";
};

//save php retuen data in global
//so that we can access anywhere
var copyData = "";

showTable();

function showTable() {
  table_body.innerHTML = "";
  $.post("../php/fetch-counselling.php", {

    },
    function(data) {
      var objData = jQuery.parseJSON(data);
      copyData = objData;

      for (var i = 0; i < objData.length; i++) {
        var row = table_body.insertRow(i);
        row.insertCell(0).innerHTML = objData[i][1];
        row.insertCell(1).innerHTML = objData[i][2];
        row.insertCell(2).innerHTML = objData[i][3];
        row.insertCell(3).innerHTML = objData[i][4];

        var editCell = row.insertCell(4);
        editCell.id = i;
        editCell.innerHTML = '<i class="fas fa-pencil-alt text-info mr-1" style="cursor: pointer;"></i>';
        editCell.onclick = function() { editRow(this.id);}
      }
    });
}


  function editRow(id) {
  //show edit section
  updateSection.style.display = "block";
    //scroll down to end
    window.scrollTo(0,document.body.scrollHeight);


    label.innerHTML = copyData[id][1];
    timeBox.value = copyData[id][2];
    totalSeatBox.value = copyData[id][3];

    var updateBtn = document.getElementById("update");

    updateBtn.onclick = function update() {
      $.post("../php/counsellingHelper.php", {
          id: copyData[id][0],
          time: timeBox.value,
          tSeat: totalSeatBox.value
        },
        function(data) {
          if (data == "successfully") {
            updateSection.style.display = "none";
            alert("UPDATE successfully");
            showTable();
          }else if (data == "error") {
            alert("update failed");
          }
        });
    };
  }

});
