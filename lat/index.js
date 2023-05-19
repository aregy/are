const url = 'https://latoolsapi.are.gy/blocks/20230504';
const xhr = new XMLHttpRequest();
const getJSON = (url, fn) => {
	xhr.open('GET', url, true);
	xhr.responseType = 'json';
	xhr.onload = () => {
	    let status = xhr.status;
	    if (status == 200) {
	        fn(status, xhr.response);
	    } else {
            fn(status, null);
      }
	};
	xhr.send();
};
const init_page = (data) => {
    const groupByDate = $('#groupByDate').dxSwitch({
    value: true,
    onValueChanged(args) {
      scheduler.option('groupByDate', args.value);
    },
  }).dxSwitch('instance');
const priorityData = [
  {
    text: 'AgentTi' // 'Firstname'
    id: 'AgentTi', // 'Firstname'
    color: '#ff9747',
  }, {
    text: 'AgentVa',
    id: 'AgentVa',
    color: '#4B8E6C',
  },
    {
    text: 'AgentSt',
    id: 'AgentSt',
    color: '#800080',
  }, {
    text: 'AgentAx',
    id: 'AgentAx',
    color: '#E6675C',
  },
];
    debugger;
  const scheduler = $('#scheduler').dxScheduler({
    endDateExpr: "Last",
    startDateExpr: "First",
    textExpr: "Count",
    //timeZone: 'America/Los_Angeles',
    dataSource: data,
    views: [{
      type: 'day',
      name: 'Day',
    },{
      type: 'week',
      name: 'Week',
    }, {
      type: 'month',
      name: 'Month',
    }],
    currentView: 'Day',
    crossScrollingEnabled: true,
    groupByDate: groupByDate.option('value'),
    currentDate: new Date(2023, 4, 4),
    startDayHour: 1,
    endDayHour: 23,
    groups: ['Sender'],
    resources: [
      {
          fieldExpr: 'Sender',
        allowMultiple: false,
        dataSource: priorityData,
        label: 'Agent',
      },
    ],
    height: 700,
  }).dxScheduler('instance');
};
const responseHandler = (status, res) => {
    if (status != 200) {
        console.log("ERROR:", status);
        return
    }
    init_page(res)
};
getJSON(url, responseHandler);
