    var months_score = [0,0,0,0,0,0,0,0,0,0,0,0];


    var ajax = new XMLHttpRequest();
    ajax.open("GET", "includes/last_up.php", true);
    ajax.send();

    var ajax1 = new XMLHttpRequest();
    ajax1.open("GET", "includes/leaderboard.php", true);
    ajax1.send();

    var ajax2 = new XMLHttpRequest();
    ajax2.open("GET", "includes/bar-graph.php", true);
    ajax2.send();

    var ajax3 = new XMLHttpRequest();
    ajax3.open("GET", "includes/eco_score.php", true);
    ajax3.send();

    var ajax4 = new XMLHttpRequest();
    ajax4.open("GET", "includes/records_period.php", true);
    ajax4.send();



    ajax4.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);
            var from_date = "";
            var to_date = "";
            var html = "";
            for(var a = 0; a < data.length; a++) {
                from_date = data[a].from_date;
                to_date = data[a].to_date;
                var date1 = timeConverter(from_date);
                var date2 = timeConverter(to_date);
            }
            if(from_date != ""){
              html += "Records period is from:";
              html += date1;
              html += " ---to--- "
              html += date2;
            }
            else{
              html += "No records";
            }

            document.getElementById("records_period").innerHTML += html;
        }
    };


    ajax3.onreadystatechange = function() {
      const monthNames = ["January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
      ];
      if (this.readyState == 4 && this.status == 200) {
        var month_score = JSON.parse(this.responseText);
        console.log(month_score);
        var score = 0;
        const d = new Date();
        html2 = "";
        for(var a = 0; a < month_score.length; a++) {
          if(month_score[a].month == monthNames[d.getMonth()] && month_score[a].score != null){
				    score = parseInt(month_score[a].score);
            html2 = score;
          }
          else if(month_score[a].month == monthNames[d.getMonth()] && month_score[a].score == null){
            html2 = 0;
          }
        }
        document.getElementById("month_score").innerHTML += html2;
      }
    };



    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);
            var last_up = "";
            var html = "";
            for(var a = 0; a < data.length; a++) {
                last_up = data[a].ts;
                var date = timeConverter(last_up);
            }
            if(last_up != ""){
              html += "Last time you uploaded was: ";
              html += date;
            }
            else{
              html += "There is no uploaded file";
            }

            document.getElementById("data").innerHTML += html;
        }
    };


    ajax1.onreadystatechange = function() {
      const monthNames = ["January", "February", "March", "April", "May", "June",
                          "July", "August", "September", "October", "November", "December"
                         ];
      if (this.readyState == 4 && this.status == 200) {
        var lead = JSON.parse(this.responseText);
        console.log(lead);
        var position = 1;
        var user_name = "";
        var score = 0;
        const d = new Date();
        html = "<caption>Leaderboard</caption><thead><tr><th>Pos</th><th>Name</th><th>Score</th></tr></thead>";
        for(var a = 0; a < lead.length; a++) {
          if(lead[a].month == monthNames[d.getMonth()] && lead[a].score != null){
            user_name = lead[a].name;
				    score = parseInt(lead[a].score);
            html+="<tr><td>" + position + "</td><td>" +user_name+ "</td><td>" +score+ "%" + "</td></tr>";
            position++;
          }
          else if(lead[a].month == monthNames[d.getMonth()] && lead[a].score == null){
            user_name = lead[a].name;
				    score = 0;
            html+="<tr><td>" + position + "</td><td>" +user_name+ "</td><td>" +score+ "%" + "</td></tr>";
            position++;
          }
        }
          document.getElementById("lead").innerHTML += html;
      }
    };

    ajax2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var graph = JSON.parse(this.responseText);
        console.log(graph);
        var score = 0;
        html3 = "";
        for(var a = 0; a < graph.length; a++) {
          if(graph[a].score == null)
            months_score[a] = 0;
          else if(graph[a].score != null)
            months_score[a] = graph[a].score;
        }
        document.getElementById("ggg").innerHTML += html3;
      }
    };





    function timeConverter(UNIX_timestamp){
      var a = new Date(UNIX_timestamp * 1000);
      var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
      var year = a.getFullYear();
      var month = months[a.getMonth()];
      var date = a.getDate();
      var hour = a.getHours();
      var min = a.getMinutes();
      var sec = a.getSeconds();
      var time = date + ' ' + month + ' ' + year + ' ' +"at " + hour + ':' + min + ':' + sec ;
      return time;
    }
