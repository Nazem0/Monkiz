//counters
var counter = {
  'clients':document.getElementById('clients_count').innerText,
  'mcs':document.getElementById('mcs_count').innerText,
  'tasks':document.getElementById('tasks_count').innerText,
  'offers':document.getElementById('offers_count').innerText
};
var clientsCtx = document.getElementById("clients-chart").getContext("2d");
var clientsChart = new Chart(clientsCtx, {
  type: "bar",
  data: {
    labels: [""],
    datasets: [
      {
        label: "Clients",
        data: [counter.clients],
        backgroundColor: ["rgba(0, 0, 255, 0.5)"],
        borderColor: ["rgba(0, 0, 0, 0.8)"],
        borderWidth: 1,
      },
      {
        label: "Maintenance Centers",
        data: [counter.mcs],
        backgroundColor: ["rgba(0, 255, 0, 0.5)"],
        borderColor: ["rgba(0, 0, 0, 0.8)"],
        borderWidth: 1,
      },
    ],
  },
  options: {
    legend: {
      display: true,
      labels: {
        boxWidth: 20,
        fontSize: 10,
      },
    },
    scales: {
      y: {
        ticks: {
          stepSize: 1
        }
      }
    }
  },
});

var tasksCtx = document.getElementById("tasks-chart").getContext("2d");
var tasksChart = new Chart(tasksCtx, {
  type: "bar",
  data: {
    labels: [""],
    datasets: [
      {
        label: "Tasks",
        data: [counter.tasks],
        backgroundColor: ["rgba(255, 255, 0, 0.5)"],
        borderColor: ["rgba(0, 0, 0, 0.8)"],
        borderWidth: 1,
      },
      {
        label: "Offers",
        data: [counter.offers],
        backgroundColor: ["rgba(0, 255, 255, 0.5)"],
        borderColor: ["rgba(0, 0, 0, 0.8)"],
        borderWidth: 1,
      },
    ],
  },
  options: {
    legend: {
      display: true,
      labels: {
        boxWidth: 20,
        fontSize: 10,
      },
    },
    scales: {
      y: {
        ticks: {
          stepSize: 1
        }
      }
    }
  },
});