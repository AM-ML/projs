$(document).ready(function(){
      let elem = $("#total");
      let table = $('#tbl').DataTable({
          ajax: {
              'url': 'back.php',
              dataSrc: ""
          },
          columns: [
              {data: 'stdID'},
              {data: 'stdName'},
              {data: 'stdFees'},
              {
                  data: null,
                  render: function(data, type, row){
                      return 0.1 * data.stdFees;
                  }
              }
          ],
          columnDefs: [
              {
                  targets: [0, 2],
                  createdCell: function(td, cellData, rowData, row, col){
                      $(td).addClass("text-end");
                  }
              }
          ]
      });
  
      // Calculate and display the total fees in US dollars
      table.on('draw', function () {
          let totalFees = 0;
          table.rows().data().each(function (row) {
              totalFees += parseFloat(row.stdFees);
          });
  
          // Format the total fees as US dollars using toLocaleString
          let formattedTotal = totalFees.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
          elem.html(formattedTotal); // Update the content of elem
      });
  });
  