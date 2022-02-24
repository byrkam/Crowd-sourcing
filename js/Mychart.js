alert("You are logged-in");
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "Octomber", "November", "December"],
      datasets: [
        {
          label: "Ecological score (by month)%",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#7cfc00","#bb00fa" ,"#00fafa" ,"#FF1493" ,"#ff4733" ,"#D2B48C" ,"#00008B"],
          data: [months_score[4], months_score[3], months_score[7], months_score[0],months_score[8],months_score[6],months_score[5],months_score[1],months_score[11],months_score[10],months_score[9],months_score[2]]
        }
      ]
    },
    options: {
      animation: {
                animateScale: true,
                animateRotate: true
      },
      responsive: false,
      legend: {
         display: false,
         labels: {fontSize: 20},
       },

      title: {
        fontSize: 30,
        fontColor: 'black',
        display: true,
        text: 'My Ecological Score (per month)'
      },
      scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }],
            xAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }],
            yAxes: [{
                ticks: {
                    fontSize: 30,
                    fontColor: 'black'
                }
            }],
            xAxes: [{
                ticks: {
                    fontSize: 30,
                    fontColor: 'black'
                }
            }]
        },
    }
});
