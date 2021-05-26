//get the context
var ctx=$('.mainGraph');
var config={
    type:'pie',
    data:{
        datasets:[{
            data:[710,8900,1866],
            backgroundColor:[
                window.chartColors.red,
                window.chartColors.blue,
                window.chartColors.green
            ]
        }],
    
    labels:[
        'agents','clients','policies',
    ]},
    options:{
        responsive:true,
        legend:{
            position:'top',
        },
        title:{
            display:false,
            text:'Chart',
        },
        animation:{
            animateScale:true,
            animateRotate:true,
        }

    }
}

//START THE JOB
var myChart=new Chart(ctx,config)



//policy sales graph
var ctx=document.getElementById('policySalesGraph');
var class_means=[6,7,9,11,8,12];
var classes=['jan','feb','mar','april','may','jun'];
var data={
   datasets:[{
           label:'Policy sales',
           data:class_means,
               backgroundColor:[
               window.chartColors.red,
               window.chartColors.blue,
               window.chartColors.yellow,
               window.chartColors.green,
               window.chartColors.purple,
               window.chartColors.grey,
               window.chartColors.orange,
               window.chartColors.black,
           ]}
        ],
        labels:classes,
};

var options={
   scales:{
       yAxes:[{ticks:{beginAtZero:true}}]
   },

   legend:{
       position:'top'
   },
   
   barPercentage:10,
   barThickness:1,
   animation:{
       animateScale:true,
   },
   responsive:true,

   
}

//START THE JOB
var myChart=new Chart(ctx,{
    type:'bar',
    data:data,
    options:options
});

// average monthy growth
//put the data inthe canvas
    //get the canvas
    var ctx=document.getElementById('averageGrowth');
    var years=['Jan','feb','april','may','jun'];
    var mean=[3.2,3.4,4.3,4.2,5.5,6.7];
    var data={
        datasets:[{
                label:'Monthly average growth',
                fill:false,
                backgroundColor: window.chartColors.green,
                borderColor: window.chartColors.green,
                data:mean,
                pointBackgroundColor:window.chartColors.green
                    
        }],
                labels:years,
    };

    var options={
        scales:{
            yAxes:[{ticks:{beginAtZero:true}}]
        },

        legend:{
            position:'top'
        },
        
        barPercentage:10,
        barThickness:1,
        animation:{
            animateScale:true,
        },
        responsive:true,

        
    }
    
    //START THE JOB
    var myChart=new Chart(ctx,{
        type:'line',
        data:data,
        options:options
    });