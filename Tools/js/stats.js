const goalArr = statsArr[0][0]
const lastTenDaysCalories = statsArr[0][1]
const days = statsArr[0][2]


const ctx = document.createElement('canvas');
    ctx.id = 'myChart'
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: days,
        datasets: [
        {
            label: 'Objectif',
            data: lastTenDaysCalories,
            borderWidth: 3,
            backgroundColor: '#005BE9',
            borderColor: '#005BE9'
          },
          {
            label: 'Consommation',
            data: goalArr,
            borderWidth: 3,
            backgroundColor: '#FFCE61',
            borderColor: '#FFCE61'
          }]
      },
      options: {
        scales: {
          y: {
            min: 0,
            step : 100,
          }
        }
      }
    });
    const container = document.querySelector('#stats div');
    container.appendChild(ctx)