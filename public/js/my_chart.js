var ctx = document.getElementById('myChartAge').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['-15ans', '15 – 18 ans', '+18 ans'],
        datasets: [{
            label: 'Ages',
            data: [12, 19, 31,],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
        }]
    },
    options: {
        responsive:true,
    }
});
function chartType(type){
    myChart.config.type = type
    myChart.update();
}
var ctG = document.getElementById('myChartGender').getContext('2d');
var myChartG = new Chart(ctG, {
    type: 'bar',
    data: {
        labels: ['Homme', 'Femme'],
        datasets: [{
            label: 'Homme',
            data: [14442, 1000,],
            backgroundColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
        }]
    },
    options: {
        responsive:true,
        scales: {
            y: {
              beginAtZero: true
            }
        }
    }
});
function chartGType(type){
    myChartG.config.type = type
    myChartG.update();
}

var ctCIN = document.getElementById('myChartCIN').getContext('2d');
var myChartCIN = new Chart(ctCIN, {
    type: 'polarArea',
    data: {
        labels: ['Avec', 'Sans'],
        datasets: [{
            label: 'CIN',
            data: [14, 10,],
            backgroundColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
        }]
    },
    options: {
        responsive:true,
        scales: {
            y: {
              beginAtZero: true
            }
        }
    }
});
function chartCINType(type){
    myChartCIN.config.type = type
    myChartCIN.update();
}
var ctscol = document.getElementById('myChartScol').getContext('2d');
var myChartScol = new Chart(ctscol, {
    type: 'pie',
    data: {
        labels: ['NON Scolarisé','Primaire','Collège','Lycée','Bac','Bac+'],
        datasets: [{
            label: 'Homme',
            data: [14442, 1000,238,5338,4234,1762],
            backgroundColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
        }]
    },
    options: {
        responsive:true,
        scales: {
            y: {
              beginAtZero: true
            }
        }
    }
});
function chartScolType(type){
    myChartScol.config.type = type
    myChartScol.update();
}
var ctspresMed = document.getElementById('myChartpresenceMed').getContext('2d');
var myChartpresenceMed = new Chart(ctspresMed, {
    type: 'pie',
    data: {
        labels: ['Oui','Non'],
        datasets: [{
            label: 'Présence',
            data: [150, 67],
            backgroundColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
        }]
    },
    options: {
        scales: {
            y: {
              beginAtZero: true
            }
        },
        responsive:true,
    }
});
function chartpresenceMedType(type){
    myChartpresenceMed.config.type = type
    myChartpresenceMed.update();
}
var ctspresSocial = document.getElementById('myChartpresenceSocial').getContext('2d');
var myChartpresenceSocial = new Chart(ctspresSocial, {
    type: 'pie',
    data: {
        labels: ['Oui','Non'],
        datasets: [{
            label: 'Présence',
            data: [43, 57],
            backgroundColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 159, 64, 1)'
            ],
        }]
    },
    options: {
        scales: {
            y: {
              beginAtZero: true
            }
        },
        responsive:true,
    }
});
function chartpresenceSocialType(type){
    myChartpresenceSocial.config.type = type
    myChartpresenceSocial.update();
}
var ctTdrg = document.getElementById('myChartTypedrg').getContext('2d');
var myChartTypedrg = new Chart(ctTdrg, {
    type: 'bar',
    data: {
        labels: ['Cigarette', 'Cannabis','Alcool','Comprimes hallucinogènes','Maajoune','Silicyou','Kala','Tanfiha','Kif','Chicha','Internet'],
        datasets: [{
            label: 'Type de drogue',
            data: [342, 100,350,234,543,125,234,199,456,237,196],
            backgroundColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(153, 192, 255, 1)',
                'rgba(153, 162, 234, 1)',
                'rgba(153, 142, 145, 1)',
                'rgba(153, 102, 85, 1)',
                'rgba(153, 92, 255, 1)',
            ],
        }]
    },
    options: {
        responsive:true,
        scales: {
            y: {
              beginAtZero: true
            }
        }
    }
});
function chartDRGType(type){
    myChartTypedrg.config.type = type
    myChartTypedrg.update();
}


