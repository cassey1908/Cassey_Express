const ctx = document.getElementById('grafica');
new Chart(ctx, {
   type: 'bar',
     data: {
           labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
           datasets: [{
             label: '# of Votes',
             data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(223, 154, 58, 0.67)',
                ],
                // anchura
                barThickness: 40,
                borderRadius: 5,
         borderWidth: 1
          }]
         },
        options: {
           
           scales: {

            
            x: {
                beginAtZero: true,
                grid:{
                  display: false
                },
                 
                  boder: {
                      display: false
                  }
            }
          }
        }
      });